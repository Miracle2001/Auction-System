<?php 

session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function bid_not_won($first_name,$email_address, $stock_name, $stock_image){
    $mail = new PHPMailer(true);

    
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "eauction13@gmail.com";                     //SMTP username
        $mail->Password   = "Auction@2022";                              //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("eauction13@gmail.com", "EAUCTION");
        $mail->addAddress($email_address);     //Add a recipient
                             

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Auction Update';
        $email_template ="
            <h4> Hi $first_name</h4>

            <br><br>
            <p> $stock_image <p>
          
            <h5>We just want to inform you that the $stock_name auction has ended and no one won because the reserve price wasn't met. </h5>
            <br/><br/>
            
        ";
        $mail->Body = $email_template;
        

        $mail->send();
        echo 'Message has been sent';
    

}

function bid_won($first_name,$email_address){
    $mail = new PHPMailer(true);

    
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "eauction13@gmail.com";                     //SMTP username
        $mail->Password   = "Auction@2022";                              //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("eauction13@gmail.com", "EAUCTION");
        $mail->addAddress($email_address);     //Add a recipient
                             

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Auction Update';
        $email_template ="
            <h2> Hi $first_name </h2>
            <h5>Congratulations you are the winner of the this. </h5>
            <br/><br/>
            
        ";
        $mail->Body = $email_template;
        

        $mail->send();
        echo 'Message has been sent';
    

}





if(isset($_POST['submit'])){

    $new_bid = mysqli_real_escape_string($con, $_POST['bid']);
    $stock_id = $_SESSION['stock_id'];
    date_default_timezone_set('Europe/Dublin');
    $date = date('d-m-y H:i:s');
        
    $bid_time = date('Y-m-d H:i:s');
    $buyer_id =  $_SESSION['buyer_id'];


    
    $highest_bidder = "SELECT * from bid WHERE  stock_id='$stock_id'";
    $query_run_bidder = mysqli_query($con, $highest_bidder);
    while($row = mysqli_fetch_array($query_run_bidder)){ 
        
        $buyers_id = $row['buyer_id'];

    }

    if($buyer_id == $buyers_id ) {

        $_SESSION['status'] = "You are already the highest bidder";
        header("Location: bid.php?stockid=$stock_id");
        exit(0);
    } else {

        $query_stock = "SELECT * from stock WHERE status='Active' AND stock_id='$stock_id'";
        $query_run_stock = mysqli_query($con,$query_stock);
        while($row = mysqli_fetch_array($query_run_stock)){

            $current_bid = $row['current_bid'];
            $start_date = strtotime($row['auction_start_date']);
            $auction_start_date = date('d-m-y H:i:s', $start_date);
            $end_date =strtotime($row['auction_date_end']);
            $auction_end_date = date('d-m-y H:i:s', $end_date);
            $starting_bid = $row['starting_bid'];
            $reserve_price = $row['reserve_price'];
        
        
            
        }

        if(!($date> $auction_end_date)){

            if(($new_bid < $starting_bid)) {

                $_SESSION['status'] = "Bid higher than starting bid";
                header("Location: bid.php?stockid=$stock_id");
                exit(0);
        
            } else if ($new_bid > $current_bid){
                $update_token = "UPDATE stock SET current_bid='$new_bid' WHERE status='Active' AND stock_id='$stock_id'";
                $update_token_run = mysqli_query($con, $update_token);

                
        
                if($update_token_run) {

                    $query_bid = "INSERT INTO bid (bid_amount, bidding_date_time, buyer_id, stock_id) VALUES ('{$new_bid}', '{$bid_time}', '{$buyer_id}', '{$stock_id}')";
                    $query_run_bid = mysqli_query($con, $query_bid);

                    $query_winner = "INSERT INTO winner (buyer_id, stock_id, bid_amount, bid_date) VALUES ('{$buyer_id}', '{$stock_id}', '{$new_bid}', '{$bid_time}')";
                    $query_winner_bid = mysqli_query($con,  $query_winner);

                    if($query_winner_bid){

                        $delete_bid = "DELETE FROM winner WHERE bid_amount<'$new_bid' AND stock_id='$stock_id'";
                        $delete_token_run = mysqli_query($con, $delete_bid);
    
    
                    }

                    
        
                    $_SESSION['status'] = "Your bid has been placed";
                    header("Location: bid.php?stockid=$stock_id");
                    exit(0);
        
                } else {
                    $_SESSION['status'] = "Something went wrong";
                    header("Location: bid.php?stockid=$stock_id");
                    exit(0);
                }

                    

                if($query_run_bid) {
        
                    $_SESSION['status'] = "It has been inserted into the bid table";
                    header("Location: bid.php?stockid=$stock_id");
                    exit(0);
        
                } else {
                    $_SESSION['status'] = "Something went wrong";
                    header("Location: bid.php?stockid=$stock_id");
                    exit(0);
                }

                

        
        
            }else {
        
                $_SESSION['status'] = "Bid higher than the current bid";
                header("Location: bid.php?stockid=$stock_id");
                exit(0);
            }

        } else {

            if(!($current_bid < $reserve_price)) {

                $bidder_winner = "SELECT * FROM winner LEFT JOIN buyer ON winner.buyer_id = buyer.buyer_id  WHERE stock_id='$stock_id'";
                $bidder_winner_query_run = mysqli_query($con, $bidder_winner);

                if($bidder_winner_query_run){

                    while($row = mysqli_fetch_array($bidder_winner_query_run)){

                        $buyer_id = $row['buyer_id'];
    
                        $first_name = $row['first_name'];
                        $email = $row['email_address'];

                        echo $buyer_id;
    
                    }

                   
                }

            


                

                

                

        



                
            }
             
        }


                
            

        

        



    }

        

    
    
    

  
}

?>