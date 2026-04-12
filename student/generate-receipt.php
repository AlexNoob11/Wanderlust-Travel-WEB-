<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['bid'])) {
    die("Unauthorized Access");
}

$bookingId = $_GET['bid'];
$userId = $_SESSION['user_id'];

// FIXED QUERY: Changed users.full_name to users.fullname
$query = "SELECT bookings.*, users.fullname, users.email 
          FROM bookings 
          JOIN users ON bookings.user_id = users.id 
          WHERE bookings.booking_id = ? AND bookings.user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $bookingId, $userId);
$stmt->execute();
$booking = $stmt->get_result()->fetch_assoc();

if (!$booking) die("Invoice not found.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt_WL_<?php echo $bookingId; ?></title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; padding: 40px; color: #333; background-color: #f4f4f4; }
        .invoice-box { 
            max-width: 800px; 
            margin: auto; 
            padding: 40px; 
            background: #fff; 
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            position: relative;
        }
        /* PAID Watermark */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 8rem;
            font-weight: bold;
            color: rgba(46, 204, 113, 0.08);
            text-transform: uppercase;
            pointer-events: none;
        }
        .header { display: flex; justify-content: space-between; margin-bottom: 50px; }
        .logo { font-size: 30px; font-weight: 800; color: #ff4d4d; }
        .status-paid { color: #27ae60; font-weight: bold; text-transform: uppercase; border: 2px solid #27ae60; padding: 4px 12px; border-radius: 4px; }
        .info-section { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 40px; }
        .table { width: 100%; border-collapse: collapse; margin: 30px 0; }
        .table th { text-align: left; padding: 15px; border-bottom: 2px solid #eee; color: #888; font-size: 0.8rem; text-transform: uppercase; }
        .table td { padding: 20px 15px; border-bottom: 1px solid #eee; }
        .totals { margin-left: auto; width: 250px; text-align: right; }
        .grand-total { font-size: 1.5rem; font-weight: bold; color: #ff4d4d; margin-top: 10px; }
        .footer { margin-top: 60px; text-align: center; font-size: 0.75rem; color: #bbb; }
        .print-btn { background: #333; color: white; padding: 12px 30px; border: none; border-radius: 30px; cursor: pointer; font-weight: 600; margin-bottom: 30px; }
        
        @media print {
            .no-print { display: none; }
            body { padding: 0; background: none; }
            .invoice-box { box-shadow: none; border: none; width: 100%; }
        }
    </style>
</head>
<body>

    <div style="text-align: center;" class="no-print">
        <button class="print-btn" onclick="window.print()">Download Receipt (PDF)</button>
    </div>

    <div class="invoice-box">
        <div class="watermark">PAID</div>
        
        <div class="header">
            <div class="logo">WanderLust.</div>
            <div style="text-align: right;">
                <div class="status-paid">Confirmed</div>
                <p style="margin-top: 10px; font-size: 0.85rem;">Booking #WL-<?php echo str_pad($booking['booking_id'], 5, '0', STR_PAD_LEFT); ?></p>
            </div>
        </div>

        <div class="info-section">
            <div>
                <small style="color: #999; text-transform: uppercase; font-weight: bold;">Traveler Details</small><br>
                <strong><?php echo htmlspecialchars($booking['fullname']); ?></strong><br>
                <?php echo htmlspecialchars($booking['email']); ?>
            </div>
            <div style="text-align: right;">
                <small style="color: #999; text-transform: uppercase; font-weight: bold;">Agency Details</small><br>
                <strong>WanderLust Travel Co.</strong><br>
                BGC, Taguig City, Philippines<br>
                Issued: <?php echo date("F d, Y", strtotime($booking['created_at'])); ?>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Destination</th>
                    <th>Travel Date</th>
                    <th>Guests</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong><?php echo ucwords(str_replace('-', ' ', $booking['location_id'])); ?></strong></td>
                    <td><?php echo date("M d, Y", strtotime($booking['travel_date'])); ?></td>
                    <td><?php echo $booking['guests']; ?> Travelers</td>
                    <td style="text-align: right; font-weight: bold;"><?php echo $booking['total_price']; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="totals">
            <p style="color: #999; margin-bottom: 5px;">Payment Method: <?php echo strtoupper($booking['payment_method']); ?></p>
            <div class="grand-total">Amount Paid: <?php echo $booking['total_price']; ?></div>
        </div>

        <div class="footer">
            <p>Thank you for choosing WanderLust! We wish you a safe and wonderful journey.</p>
            <p>This is an electronically generated receipt. No physical signature required.</p>
        </div>
    </div>

</body>
</html>