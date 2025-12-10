<?php

function getCourtData($courtId) {
    global $db;
    $query = $db->query("SELECT * FROM lapangan WHERE id = $courtId");
    return $query->fetch_assoc();
}

function getCourtPhotos($courtId) {
    $photos = [];
    $index = 1;
    
    while (file_exists("img/court{$courtId}-{$index}.jpg")) {
        $photos[] = "img/court{$courtId}-{$index}.jpg";
        $index++;
    }
    
    if (empty($photos)) {
        $photos[] = "img/lapangan.png"; 
    }
    
    return $photos;
}

function getAvailableSlots($courtId, $tanggal) {
    global $db;
    
    $booked_result = $db->query("SELECT jam FROM transaksi 
                                   WHERE lapangan_id = $courtId 
                                   AND tanggal = '$tanggal'
                                   AND status = 'booked'");
    
    $booked_jam = [];
    while($row = $booked_result->fetch_assoc()) {
        $booked_jam[] = substr($row['jam'], 0, 5);
    }
    
    $jadwal_result = $db->query("SELECT jam FROM jadwal WHERE lapangan_id = $courtId ORDER BY jam");
    $available_slots = [];
    
    while($row = $jadwal_result->fetch_assoc()) {
        $jam = substr($row['jam'], 0, 5);
        $jam_end = date('H:i', strtotime($jam . ' +1 hour'));
        $slot_text = "$jam - $jam_end";
        $is_booked = in_array($jam, $booked_jam);
        
        $available_slots[] = [
            'text' => $slot_text,
            'booked' => $is_booked,
            'jam_mulai' => $jam
        ];
    }
    
    if (empty($available_slots)) {
        $available_slots = [
            ['text' => '11:00 - 12:00', 'booked' => false, 'jam_mulai' => '11:00'],
            ['text' => '12:00 - 13:00', 'booked' => false, 'jam_mulai' => '12:00'],
            ['text' => '13:00 - 14:00', 'booked' => false, 'jam_mulai' => '13:00'],
            ['text' => '15:00 - 16:00', 'booked' => false, 'jam_mulai' => '15:00'],
            ['text' => '16:00 - 17:00', 'booked' => false, 'jam_mulai' => '16:00'],
            ['text' => '17:00 - 18:00', 'booked' => false, 'jam_mulai' => '17:00'],
            ['text' => '19:00 - 20:00', 'booked' => false, 'jam_mulai' => '19:00'],
            ['text' => '22:00 - 23:00', 'booked' => false, 'jam_mulai' => '22:00'],
            ['text' => '23:00 - 00:00', 'booked' => false, 'jam_mulai' => '23:00'],
        ];
    }
    
    return $available_slots;
}

function processBooking($user_id, $lapangan_id, $tanggal, $jam_mulai) {
    global $db;
    
    $jam = explode(" - ", $jam_mulai)[0] . ':00';
    
    $check = $db->query("SELECT id FROM transaksi 
                          WHERE lapangan_id = $lapangan_id 
                          AND tanggal = '$tanggal'
                          AND jam = '$jam'
                          AND status = 'booked'");
    
    if ($check->num_rows > 0) {
        return ['success' => false, 'message' => 'Jam sudah dibooking!'];
    }
    
    $insert = $db->query("INSERT INTO transaksi (user_id, lapangan_id, tanggal, jam, status) 
                           VALUES ($user_id, $lapangan_id, '$tanggal', '$jam', 'booked')");
    
    if ($insert) {
        return ['success' => true, 'message' => "Booking berhasil untuk jam $jam_mulai pada $tanggal!"];
    } else {
        return ['success' => false, 'message' => "Gagal booking: " . $db->error];
    }
}

?>