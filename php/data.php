<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (id_penerima_pesan = {$row['unique_id']}
                OR id_pengirim_pesan = {$row['unique_id']}) AND (id_pengirim_pesan = {$outgoing_id} 
                OR id_penerima_pesan = {$outgoing_id}) ORDER BY id_pesan DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['pesan'] : $result ="No message available";
        (strlen($result) > 28) ? $pesan =  substr($result, 0, 28) . '...' : $pesan = $result;
        if(isset($row2['id_pengirim_pesan'])){
            ($outgoing_id == $row2['id_pengirim_pesan']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="data/images/'. $row['gambar'] .'" alt="">
                    <div class="details">
                        <span>'. $row['nickname']. '</span>
                        <p>'. $you . $pesan .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>