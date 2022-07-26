<?php
    while($linha = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$linha['unique_id']}
                 OR outgoing_msg_id = {$linha['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                 OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $linha2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $linha2['msg'];
        }else{
            $result = "Nenhuma mensagem disponível";
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;

        ($outgoing_id == $linha2['outgoing_msg_id']) ? $voce = "Você: " : $voce = "";

        ($linha['status'] == "Offline") ? $offline = "offline" : $offline = "";

        $output .= '<a href="chat.php?user_id='.$linha['unique_id'].'">
                    <div class="content">
                        <img src="php/imagens/'. $linha["img"] .'" alt="">
                        <div class="details">
                            <span>'. $linha['nome'] . " " . $linha['sobrenome'] .'</span>
                            <p>'.$voce . $msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>