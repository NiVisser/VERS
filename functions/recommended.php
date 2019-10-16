<div class="container">
    <div class="row">
        <?php
        if(isset($_SESSION['login_user'])) {
            $user_name = $_SESSION['login_user'];
            $get_user_id= "SELECT user_id FROM users WHERE username = '$user_name'";
            $response_user_id = mysqli_query($db,$get_user_id);

            $rows = mysqli_num_rows($response_user_id);
            // If result matched $myusername and $mypassword, table row must be 1 row
            if($rows == 1) {
                $result = mysqli_fetch_assoc($response_user_id);
                $user_id = $result['user_id'];
                //SELECT event_name, event_desc, address, dates, price FROM events WHERE user_id = 1;
                $get_events = "SELECT event_name, event_desc, address, dates, price FROM events WHERE user_id = '$user_id'";
                $response_events = mysqli_query($db,$get_events);
                $rows = mysqli_num_rows($response_events);
                if($rows > 0) {
                    while($row = mysqli_fetch_assoc($response_events)) {
                        $event_name = $row['event_name'];
                        $event_desc = $row['event_desc'];
                        $address = $row['address'];
                        $dates = $row['dates'];
                        $price = $row['price'];
                        echo
                        "<div class='col-md-4'>
                            <div class=\"card\" style=\"margin-bottom: 3em;\">
                                <div class=\"card-body\">
                                    <h3 class=\"card-title\">$event_name -- $dates</h3>
                                    <p class=\"card-text\">$event_desc</p>
                                    <h5 class='text-secondary'>Informatie:</h5>
                                    <ul class='list-group list-group-flush'>
                                        <li class='list-group-item'>Waar: $address</li>
                                        <li class='list-group-item'>Prijs (p.p): € $price,-</li>
                                    </ul>
                                </div>
                            </div>
                        </div>";
                    }
                }
            }
        }
        ?>
    </div>
</div>




