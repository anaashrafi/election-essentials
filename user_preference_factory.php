
<?php
session_start();
             require "connection.php";
    require 'send_data_form.php';
    class UserPreferenceProfileFactory extends AbstractFormFactory{
        
        function __construct(){}
        function createInputs()
        {
             

        if($_SESSION['user'] != "Anon1" && $_SESSION['user'] != ''){
            $connect = Connection::getInstance();
            $db = $connect->getDB();
            $statement = $db->prepare("use Election_Essentials;");
            $sqlGet = 'Select * from Us_Pr Where Username = "'.$_SESSION['user'].'";';
            $statement->execute();
            $statement = $db->prepare($sqlGet);
            $statement->execute();
            $data = $statement->fetchAll();
            $jobs = $data[0]['Jobs_Wages'];
            $taxes = $data[0]['Taxes'];
            $cjs = $data[0]['Criminal_Justice_System'];
            $healthcare = $data[0]['Healthcare'];
            $reproductive_issues = $data[0]['Reproductive_Issues'];
            $environment = $data[0]['Environment'];
            $immigration = $data[0]['Immigration'];
            $education = $data[0]['Education'];
            $lgbtq = $data[0]['LGBTQ'];
            $gun_violence = $data[0]['Gun_Violence'];
        }
            echo '<div class="w3-content w3-left-align" style="width:70%;">

            <div class="w3-container w3-half">
                <input id = "jobs" class="w3-check" type="checkbox" '; if($jobs){echo "checked";} echo '>
                <label>Jobs/Wages</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "environment"  class="w3-check" type="checkbox" '; if($environment){echo "checked";} echo '>
                <label>Environment</label>
            </div>
                                             
            <div class="w3-container w3-half">
                <input id = "cjs" class="w3-check" type="checkbox" '; if($cjs){echo "checked";} echo '>
                <label>Criminal Justice System</label>
            </div>
                  
            <div class="w3-container w3-half">
                <input id = "immigration" class="w3-check" type="checkbox" '; if($immigration){echo "checked";} echo '>
                <label>Immigration</label>
            </div>
                    
            <div class="w3-container w3-half">
                <input id = "healthcare" class="w3-check" type="checkbox" '; if($healthcare){echo "checked";} echo '>
                <label>Healthcare</label>
            </div>
                     
            <div class="w3-container w3-half">
                <input id = "education" class="w3-check" type="checkbox" '; if($education){echo "checked";} echo '>
                <label>Education</label>
            </div>
                   
            <div class="w3-container w3-half">
                <input id = "taxes" class="w3-check" type="checkbox" '; if($taxes){echo "checked";} echo '>
                <label>Taxes</label>
            </div>
                
            <div class="w3-container w3-half">
                <input id = "lgbtq" class="w3-check" type="checkbox" '; if($lgbtq){echo "checked";} echo '>
                <label>LGBTQ+</label>
            </div>
                  
            <div class="w3-container w3-half">
                <input id = "reproductive_issues" class="w3-check" type="checkbox" '; if($reproductive_issues){echo "checked";} echo '>
                <label>Reproductive Issues</label>
            </div>
                  
            <div class="w3-container w3-half">
                <input id="gun_violence" class="w3-check" type="checkbox" '; if($gun_violence){echo "checked";} echo '>
                <label>Gun Violence</label>
            </div>
        </div>';

        }
        function createSubmit()
        {
            echo '<div class = "w3-container">
                        <button id="submit" class="w3-button w3-light-gray w3-round w3-border w3-margin-top w3-margin-bottom">SUBMIT</button>
                    </div>
                    <script >
                        $(document).ready(function(){
                            $("#submit").click(function(){
                                var jobs = $("#jobs").prop("checked");
                                var environment = $("#environment").prop("checked");  
                                var cjs = $("#cjs").prop("checked");
                                var immigration = $("#immigration").prop("checked");
                                var healthcare = $("#healthcare").prop("checked");
                                var education = $("#education").prop("checked");
                                var taxes = $("#taxes").prop("checked");
                                var lgbtq = $("#lgbtq").prop("checked");
                                var reproductive_issues = $("#reproductive_issues").prop("checked");
                                var gun_violence = $("#gun_violence").prop("checked");

                                var preference_send = "preference_send.php";
                                $.post(preference_send, {jobs: jobs, 
                                environment: environment,
                                cjs: cjs,
                                immigration: immigration,
                                healthcare: healthcare,
                                education: education,
                                taxes: taxes,
                                lgbtq: lgbtq,
                                reproductive_issues: reproductive_issues,
                                gun_violence: gun_violence}, function (response) {
                                    alert("Essentials Changed");
                                    
                            });  

                            });
                        });

                    </script> ';





        }


     }


?>