using System;
using System.Drawing;
using System.Windows.Forms;

namespace BiometricApp
{
    public partial class hris_biometric : Form
    {
        public hris_biometric()
        {
            InitializeComponent();


        }

        private void registerBtn_Click(object sender, EventArgs e)
        {
            // Close the current form

            // Open the frmDBEnrollment form
            frmDBEnrollment enrollmentForm = new frmDBEnrollment();
            enrollmentForm.Show();
        }

        private void attendanceBtn_Click(object sender, EventArgs e)
        {
            // Close the current form

            // Open the frmDBVerify form
            frmDBVerify verifyForm = new frmDBVerify();
            verifyForm.Show();
        }
    }
}
