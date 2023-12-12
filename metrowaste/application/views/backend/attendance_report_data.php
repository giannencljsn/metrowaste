<?php if (!empty($attendance)): ?>
    <table id="example234" class="display" style="width:100%">
        <thead>
            <tr>
                
                <th>Employee Name</th>
                <th>Date</th>
                <th>Sign In</th>
                <th>Sign Out</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendance as $row): ?>
                <tr>
                   
                    <td><?php echo $row->employee_name; ?></td>
                    <td><?php echo $row->date; ?></td>
                    <td><?php echo $row->sign_in; ?></td>
                    <td><?php echo $row->sign_out; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No attendance data found.</p>
<?php endif; ?>
