<?php
// Check color status
function statusStyle($status)
{
    $style = '
        style="
            width:60%;
            text-align:center;
        "
    ';

    switch ($status) {
        case 'Sale':
            echo '<span class="badge bg-info" ' . $style . '">' . $status . '</span>';
            break;
        case 'Available':
            echo '<span class="badge bg-success" ' . $style . '>' . $status . '</span>';
            break;
        case 'Booked':
            echo '<span class="badge bg-warning" ' . $style . '>' . $status . '</span>';
            break;
        case 'Blocked':
            echo '<span class="badge bg-danger" ' . $style . '>' . $status . '</span>';
            break;
    }
}
