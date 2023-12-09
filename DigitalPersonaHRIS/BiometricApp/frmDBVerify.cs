using DPUruNet;
using System;
using System.Linq;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Drawing.Imaging;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;
using UareUSampleCSharp;
using MySql.Data.MySqlClient;


namespace BiometricApp
{
    public partial class frmDBVerify : Form
    {
        public MySqlConnection conn = new MySqlConnection("Server=localhost;Database=hrsystemci;Uid=root;");

        public frmDBVerify()
        {
            InitializeComponent();
        }
        private Reader currentReader;
        public Reader CurrentReader
        {
            get { return currentReader; }
            set
            {
                currentReader = value;
                SendMessage(Action.UpdateReaderState, value);
            }
        }
        private ReaderCollection _readers;
        private void LoadScanners()
        {
            cboReaders.Text = string.Empty;
            cboReaders.Items.Clear();
            cboReaders.SelectedIndex = -1;

            try
            {
                _readers = ReaderCollection.GetReaders();

                foreach (Reader Reader in _readers)
                {
                    cboReaders.Items.Add(Reader.Description.Name);
                }

                if (cboReaders.Items.Count > 0)
                {
                    cboReaders.SelectedIndex = 0;
                    //btnCaps.Enabled = true;
                    //btnSelect.Enabled = true;
                }
                else
                {
                    //btnSelect.Enabled = false;
                    //btnCaps.Enabled = false;
                }
            }
            catch (Exception ex)
            {
                //message box:
                String text = ex.Message;
                text += "\r\n\r\nPlease check if DigitalPersona service has been started";
                String caption = "Cannot access readers";
                MessageBox.Show(text, caption);
            }
        }
        private const int PROBABILITY_ONE = 0x7fffffff;
        private Fmd firstFinger;
        int count = 0;
        DataResult<Fmd> resultEnrollment;
        List<Fmd> preenrollmentFmds;
        /// <summary>
        /// Open a device and check result for errors.
        /// </summary>
        /// <returns>Returns true if successful; false if unsuccessful</returns>
        public bool OpenReader()
        {
            using (Tracer tracer = new Tracer("Form_Main::OpenReader"))
            {
                reset = false;
                Constants.ResultCode result = Constants.ResultCode.DP_DEVICE_FAILURE;

                // Open reader
                result = currentReader.Open(Constants.CapturePriority.DP_PRIORITY_COOPERATIVE);

                if (result != Constants.ResultCode.DP_SUCCESS)
                {
                    MessageBox.Show("Error:  " + result);
                    reset = true;
                    return false;
                }

                return true;
            }
        }
        /// <summary>
        /// Check quality of the resulting capture.
        /// </summary>
        public bool CheckCaptureResult(CaptureResult captureResult)
        {
            using (Tracer tracer = new Tracer("Form_Main::CheckCaptureResult"))
            {
                if (captureResult.Data == null || captureResult.ResultCode != Constants.ResultCode.DP_SUCCESS)
                {
                    if (captureResult.ResultCode != Constants.ResultCode.DP_SUCCESS)
                    {
                        reset = true;
                        throw new Exception(captureResult.ResultCode.ToString());
                    }

                    // Send message if quality shows fake finger
                    if ((captureResult.Quality != Constants.CaptureQuality.DP_QUALITY_CANCELED))
                    {
                        throw new Exception("Quality - " + captureResult.Quality);
                    }
                    return false;
                }

                return true;
            }
        }
        private ReaderSelection _readerSelection;
        /// <summary>
        /// Hookup capture handler and start capture.
        /// </summary>
        /// <param name="OnCaptured">Delegate to hookup as handler of the On_Captured event</param>
        /// <returns>Returns true if successful; false if unsuccessful</returns>
        public bool StartCaptureAsync(Reader.CaptureCallback OnCaptured)
        {
            using (Tracer tracer = new Tracer("Form_Main::StartCaptureAsync"))
            {
                // Activate capture handler
                currentReader.On_Captured += new Reader.CaptureCallback(OnCaptured);

                // Call capture
                if (!CaptureFingerAsync())
                {
                    return false;
                }

                return true;
            }
        }
        /// <summary>
        /// Check the device status before starting capture.
        /// </summary>
        /// <returns></returns>
        public void GetStatus()
        {
            using (Tracer tracer = new Tracer("Form_Main::GetStatus"))
            {
                Constants.ResultCode result = currentReader.GetStatus();

                if ((result != Constants.ResultCode.DP_SUCCESS))
                {
                    reset = true;
                    throw new Exception("" + result);
                }

                if ((currentReader.Status.Status == Constants.ReaderStatuses.DP_STATUS_BUSY))
                {
                    Thread.Sleep(50);
                }
                else if ((currentReader.Status.Status == Constants.ReaderStatuses.DP_STATUS_NEED_CALIBRATION))
                {
                    currentReader.Calibrate();
                }
                else if ((currentReader.Status.Status != Constants.ReaderStatuses.DP_STATUS_READY))
                {
                    throw new Exception("Reader Status - " + currentReader.Status.Status);
                }
            }
        }
        /// <summary>
        /// Function to capture a finger. Always get status first and calibrate or wait if necessary.  Always check status and capture errors.
        /// </summary>
        /// <param name="fid"></param>
        /// <returns></returns>
        public bool CaptureFingerAsync()
        {
            using (Tracer tracer = new Tracer("Form_Main::CaptureFingerAsync"))
            {
                try
                {
                    GetStatus();

                    Constants.ResultCode captureResult = currentReader.CaptureAsync(Constants.Formats.Fid.ANSI, Constants.CaptureProcessing.DP_IMG_PROC_DEFAULT, currentReader.Capabilities.Resolutions[0]);
                    if (captureResult != Constants.ResultCode.DP_SUCCESS)
                    {
                        reset = true;
                        throw new Exception("" + captureResult);
                    }

                    return true;
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error:  " + ex.Message);
                    return false;
                }
            }
        }
        /// <summary>
        /// Create a bitmap from raw data in row/column format.
        /// </summary>
        /// <param name="bytes"></param>
        /// <param name="width"></param>
        /// <param name="height"></param>
        /// <returns></returns>
        public Bitmap CreateBitmap(byte[] bytes, int width, int height)
        {
            byte[] rgbBytes = new byte[bytes.Length * 3];

            for (int i = 0; i <= bytes.Length - 1; i++)
            {
                rgbBytes[(i * 3)] = bytes[i];
                rgbBytes[(i * 3) + 1] = bytes[i];
                rgbBytes[(i * 3) + 2] = bytes[i];
            }
            Bitmap bmp = new Bitmap(width, height, PixelFormat.Format24bppRgb);

            BitmapData data = bmp.LockBits(new Rectangle(0, 0, bmp.Width, bmp.Height), ImageLockMode.WriteOnly, PixelFormat.Format24bppRgb);

            for (int i = 0; i <= bmp.Height - 1; i++)
            {
                IntPtr p = new IntPtr(data.Scan0.ToInt64() + data.Stride * i);
                System.Runtime.InteropServices.Marshal.Copy(rgbBytes, i * bmp.Width * 3, p, bmp.Width * 3);
            }

            bmp.UnlockBits(data);

            return bmp;
        }
        /// <summary>
        /// Handler for when a fingerprint is captured.
        /// </summary>
        /// <param name="captureResult">contains info and data on the fingerprint capture</param>
        public void OnCaptured(CaptureResult captureResult)
        {
            try
            {
                // Check capture quality and throw an error if bad.
                if (!CheckCaptureResult(captureResult)) return;

                // Create bitmap
                foreach (Fid.Fiv fiv in captureResult.Data.Views)
                {
                    SendMessage(Action.SendBitmap, CreateBitmap(fiv.RawImage, fiv.Width, fiv.Height));
                }

                //Verification Code
                try
                {
                    // Check capture quality and throw an error if bad.
                    if (!CheckCaptureResult(captureResult)) return;

                    SendMessage(Action.SendMessage, "A finger was captured.");

                    DataResult<Fmd> resultConversion = FeatureExtraction.CreateFmdFromFid(captureResult.Data, Constants.Formats.Fmd.ANSI);
                    if (resultConversion.ResultCode != Constants.ResultCode.DP_SUCCESS)
                    {
                        if (resultConversion.ResultCode != Constants.ResultCode.DP_TOO_SMALL_AREA)
                        {
                            Reset = true;
                        }
                        throw new Exception(resultConversion.ResultCode.ToString());
                    }

                    firstFinger = resultConversion.Data;

                    using (MySqlConnection conn = new MySqlConnection("Server=localhost;Database=hrsystemci;Uid=root;"))
                    {
                        conn.Open();

                        // Use MySqlCommand and MySqlDataAdapter for MySQL
                        MySqlCommand cmd = new MySqlCommand("SELECT ef.*, e.first_name, e.last_name " +
                                                           "FROM employee_fingerprint ef " +
                                                           "LEFT JOIN employee e ON ef.employee_id = e.em_id", conn);
                        MySqlDataAdapter adapter = new MySqlDataAdapter(cmd);
                        DataTable dt = new DataTable();
                        adapter.Fill(dt);

                        List<string> lstledgerIds = new List<string>();
                        List<string> lstFullNames = new List<string>();

                        count = 0;

                        if (dt.Rows.Count > 0)
                        {
                            for (int i = 0; i < dt.Rows.Count; i++)
                            {
                                lstledgerIds.Add(dt.Rows[i]["employee_id"].ToString());
                                string firstName = dt.Rows[i]["first_name"].ToString();
                                string lastName = dt.Rows[i]["last_name"].ToString();
                                string fullName = $"{firstName} {lastName}";
                                lstFullNames.Add(fullName);
                                Fmd val = Fmd.DeserializeXml(dt.Rows[i]["fingerprint"].ToString());
                                CompareResult compare = Comparison.Compare(firstFinger, 0, val, 0);
                                if (compare.ResultCode != Constants.ResultCode.DP_SUCCESS)
                                {
                                    Reset = true;
                                    throw new Exception(compare.ResultCode.ToString());
                                }
                                if (Convert.ToDouble(compare.Score.ToString()) == 0)
                                {
                                  
                                  
                                        

                                        string currentDate = DateTime.Now.ToString("yyyy-MM-dd");

                                    // Check if an entry with the employee ID exists for today
                                    MySqlCommand checkCmd = new MySqlCommand("SELECT * FROM attendance WHERE date = @currentDate AND em_code = @employeeId", conn);
                                    checkCmd.Parameters.AddWithValue("@currentDate", currentDate);
                                    checkCmd.Parameters.AddWithValue("@employeeId", lstledgerIds[i].ToString());

                                    using (MySqlDataReader reader = checkCmd.ExecuteReader())
                                    {
                                        if (reader.HasRows)
                                        {
                                            reader.Read();
                                            string signInTimeStr = reader["sign_in"].ToString();
                                            DateTime signInDateTime = DateTime.Parse(signInTimeStr);
                                            DateTime currentTime = DateTime.Now;
                                            TimeSpan timeDifference = currentTime - signInDateTime;

                                            // Subtract 1 hour from the total working hours
                                            int totalMinutes = (int)timeDifference.TotalMinutes;
                                            totalMinutes -= 60;

                                            int hours = totalMinutes / 60;
                                            int minutes = totalMinutes % 60;

                                            reader.Close();

                                            // Update the sign-out time and working hours in the database
                                            MySqlCommand updateCmd = new MySqlCommand("UPDATE attendance SET sign_out = @currentTime, working_hour = @workingHours WHERE date = @currentDate AND em_code = @employeeId", conn);
                                            updateCmd.Parameters.AddWithValue("@currentTime", DateTime.Now.ToString("HH:mm"));
                                            updateCmd.Parameters.AddWithValue("@workingHours", $"{hours} {(hours == 1 ? "hour" : "hours")} {minutes} {(minutes == 1 ? "minute" : "minutes")}");
                                            updateCmd.Parameters.AddWithValue("@currentDate", currentDate);
                                            updateCmd.Parameters.AddWithValue("@employeeId", lstledgerIds[i].ToString());
                                            updateCmd.ExecuteNonQuery();

                                            MessageBox.Show("Employee ID is: " + lstledgerIds[i].ToString() + "\nSign-out Time: " + DateTime.Now.ToString("HH:mm"));
                                            count++;

                                        }

                                        else
                                        {
                                                // Entry does not exist, insert a new record
                                                reader.Close();
                                                MySqlCommand insertCmd = new MySqlCommand("INSERT INTO attendance (em_code, employee_name,  date, sign_in) VALUES (@employeeId, @employeeName, @currentDate, @currentTime)", conn);
                                                insertCmd.Parameters.AddWithValue("@employeeId", lstledgerIds[i].ToString());
                                                insertCmd.Parameters.AddWithValue("@employeeName", lstFullNames[i].ToString());
                                                insertCmd.Parameters.AddWithValue("@currentDate", currentDate);
                                                insertCmd.Parameters.AddWithValue("@currentTime", DateTime.Now.ToString("HH:mm"));
                                                insertCmd.ExecuteNonQuery();


                                            MessageBox.Show("Employee ID is: " + lstledgerIds[i].ToString() + "\nSign-in Time: " + DateTime.Now.ToString("HH:mm"));
                                            count++;

                                        }
                                        }
                                    

                                    break; // Exit the loop after processing the matched employee
                                }
                            }

                            if (count == 0)
                            {
                                SendMessage(Action.SendMessage, "Fingerprint not registered.");
                            }
                        }
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
            }
            catch (Exception ex)
            {
                // Send error message, then close form
                SendMessage(Action.SendMessage, "Error:  " + ex.Message);
            }
        }
        /// <summary>
        /// Holds fmds enrolled by the enrollment GUI.
        /// </summary>
        public Dictionary<int, Fmd> Fmds
        {
            get { return fmds; }
            set { fmds = value; }
        }
        private Dictionary<int, Fmd> fmds = new Dictionary<int, Fmd>();

        /// <summary>
        /// Reset the UI causing the user to reselect a reader.
        /// </summary>
        public bool Reset
        {
            get { return reset; }
            set { reset = value; }
        }
        private bool reset;


        private enum Action
        {
            UpdateReaderState,
            SendBitmap,
            SendMessage
        }
        private delegate void SendMessageCallback(Action state, object payload);
        private void SendMessage(Action action, object payload)
        {
            try
            {
                if (this.pbFingerprint.InvokeRequired)
                {
                    SendMessageCallback d = new SendMessageCallback(SendMessage);
                    this.Invoke(d, new object[] { action, payload });
                }
                else
                {
                    switch (action)
                    {
                        case Action.SendMessage:
                            MessageBox.Show((string)payload);
                            break;
                        case Action.SendBitmap:
                            pbFingerprint.Image = (Bitmap)payload;
                            pbFingerprint.Refresh();
                            break;
                    }
                }
            }
            catch (Exception)
            {
            }
        }
        private void frmDBVerify_Load(object sender, EventArgs e)
        {
            // Reset variables
            LoadScanners();
            firstFinger = null;
            resultEnrollment = null;
            preenrollmentFmds = new List<Fmd>();
            pbFingerprint.Image = null;
            if (CurrentReader != null)
            {
                CurrentReader.Dispose();
                CurrentReader = null;
            }
            CurrentReader = _readers[cboReaders.SelectedIndex];
            if (!OpenReader())
            {
                //this.Close();
            }

            if (!StartCaptureAsync(this.OnCaptured))
            {
                //this.Close();
            }

        }
    }
}
