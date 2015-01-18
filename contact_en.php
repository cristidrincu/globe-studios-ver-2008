<?  
	require_once("classes/class.ocrcaptcha.php");
	$captcha = new ocr_captcha();

    if(isset($_POST['submitBtn']) && $_POST['submitBtn']=="send") {   

		require_once("classes/auxiliary.php");
		require_once("classes/class.htmlMimeMail.php");
	  
		$contactErrorMessage = "";    
		if($captcha->check_captcha($_POST['public_key'],$_POST['private_key']))	 { 
				$contactErrorMessage = checkContactForm($_POST); 
				if($contactErrorMessage=="") {
					$firtsname          = $_POST['firstname'];
					$lastname           = $_POST['lastname'];
					$phone              = $_POST['phone'];
					$email              = $_POST['email'];
					$company            = $_POST['company'];
					$domainOfActivity   = $_POST['domain_of_activity'];					
					$message            = $_POST['message'];
					
					$htmlText="";
					$htmlText .=   '<table align="center" width="99%" style="font-weight:bold;" border="1">';
					$htmlText .=   '<tr style="font-weight:bold">';
					$htmlText .=   '    <td colspan="2">Cerere Contact</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td width="200">Nume:&nbsp;</td>';
					$htmlText .=   '    <td>'.$firstname." ".$lastname.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td width="200">Telefon:&nbsp;</td>';
					$htmlText .=   '    <td>'.$phone.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';                                        
					$htmlText .=   '    <td>Email:&nbsp;</td>';
					$htmlText .=   '    <td>'.$email.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';                                        
					$htmlText .=   '    <td>Companie:&nbsp;</td>';
					$htmlText .=   '    <td>'.$company.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';                                        
					$htmlText .=   '    <td>Domain of activity:&nbsp;</td>';
					$htmlText .=   '    <td>'.$domainOfActivity.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td>Mesaj:&nbsp;</td>';
					$htmlText .=   '    <td>'.nl2br($message).'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '</table>';
					
					$text  =   'Cerere Contact/r/n';
					$text .=   'Nume:'.$firstname." ".$lastname.'/r/n';
					$text .=   'Telefon:'.$telefon.'/r/n';
					$text .=   'Email:'.$email.'/r/n';
					$text .=   'Companie:'.$company.'/r/n';
					$text .=   'Domain of activit:'.$domainOfActivity.'/r/n';
					$text .=   'Mesaj:'.nl2br($message).'/r/n';
		
                    $to='office@globe-studios.com';                                                            
                    $from = "client@globe-studios.com";
                    $subject = "Cerere Contact EN";    
                    $html = "<HTML><HEAD></HEAD><BODY>".$htmlText."</BODY></HTML>";
							
					$mail=new htmlMimeMail();
					$mail->setHtml($htmlText, $text);
					$mail->setReturnPath($to);
					$mail->setFrom($from);
					$mail->setSubject($subject);
					$mail->setHeader("X-Mailer","globe-studios.com");
					$mail->setHeader("X-Priority","1");
					$mail->setHeader("X-Sender","<www.globe-studios.com>");
					
					$result = @$mail->send(array($to));
					
					unset($firstname);
					unset($lastname);
					unset($phone);
					unset($email);
					unset($company);
					unset($domainOfActivity);
					unset($message);
					
					if (!$result){
						  $contactErrorMessage .= "An error has occured while processing your request. Please try again later. Thank You!";	  
					}
					else {
						  $contactErrorMessage .= "Your message has been sent succesfully. You'll be contacted in the shortest time possible. Thank You!";	  
					}  
				} 
		} else {  // else captcha
			$contactErrorMessage .= "The code entered does not match the code in the image";		
		}
    }                                                           
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="description" content="Web design, web development, e-marketing&amp;sales. Welcome to Globe-Studios. Our job consists of designing and developing web applications. The projects developed so far range from mini web sites to e-commerce solutions, using technologies like Flash and PHP"/>
<meta name="keywords" content="web design, web development, e-commerce, search engine optimization, php, mysql, adobe flash, web applications, web solutions, home page package, corporate package, e-commerce package, sell products online,  portfolio, multimedia, digital media, graphic design" />

<link rel="stylesheet" type="text/css" href="css/globe_2008.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/menu_style.css" media="screen"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/pngFix/jquery.pngFix.js"></script>

<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
</script> 
<title>Globe-Studios :: Web :: Multimedia :: Video - Contact</title>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2956369-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</head>
<body>

<div class="containerBackground">
	<div class="wrapperPicBackground"></div>
</div>

<div class="containerMainLogo">
	<div class="containerLogo">
    	<div class="wrapperMenuLanguages">
        	<div class="containerUlLanguages">
                <ul>
                    <li>
                        <img src="img/lang_flags/flag_ro.jpg" alt="" border="0" width="16" height="15"/>                    </li>
                    
                    <li>
                            <a href="contact.php" target="_self">Romanian</a>                     </li>
                </ul>
             </div><!--ends containerUlLanguages-->
            
           
            <!--<div class="containerUlLanguages">
                <ul>
                    <li>
                        <img src="img/lang_flags/flag_it.jpg" alt="" border="0" width="16" height="15"/>                    </li>                    
                    <li>
                        <a href="" target="_self">Italian</a>                    </li>
                </ul>
            </div>-->
            
           
            <div class="containerUlLanguages">
                <ul>
                    <li>
                        <img src="img/lang_flags/flag_en.jpg" alt="" border="0" width="16" height="15"/>                    
                    </li>
                    
                    <li>
                        <a href="#" target="_self">English</a>                    
                    </li>
                </ul>
            </div>
        </div><!--ends wrapperMenuLanguages-->
        
        <br class="clearFloats"/>
    </div>
  <!--ends containerLogo-->
</div><!--containerMainLogo--> 
   
<div class="parentBox">    
<div class="mainBox">
    
    <div class="containerMenu">
    	<ul id="menu">
            <li><a href="index_en.html" title="">Home</a></li>
            
          <li><a href="about_us.html" title="">About us</a></li>
            
          <li><a href="services.html" title="" >Solutions</a></li>
            
          <li><a href="portfolio.html" title="">Portfolio</a></li>
            
          <li><a class="activeLink" href="contact_en.php" title="">Contact</a></li>
      </ul>
    </div><!--ends containerMenu-->
    
    <br class="clearFloats"/>
    
     <h3 class="overTransparency">
        Questions? Here's where you can ask them.
     </h3>
    
  <div class="containerTextIntroGlobe">
   	 
</div><!--ends containerTextIntroGlobe-->
    
  	<div class="containerMainFormularContact">

        
        <div class="wrapperMiddleFormularContact">
        	<div class="containerForm">
            <form name="contactForm" method="post" action="contact_en.php">
            	<div class="fieldsFormContact">
                            <?
                                if(isset($contactErrorMessage)) {
                            ?>
                        	<p class="captchaText">
                                <?
                                    echo $contactErrorMessage;
                                ?>
                                <br class="clearFloats"/>
                            </p>
                            <?
                            }
                            ?>								
							                	
                            <p>
                            	<label class="labelTitle">Last name*:</label>                            
                            	<input type="text" id="campContact" name="firstname" value="<?=(isset($firstname) ? $firstname : "")?>"/>                            
                            	<br class="clearFloats"/>                            
                            </p>
                            
                            <p>
                            	<label class="labelTitle">First name*:</label>                            
                            	<input type="text" id="campContact" name="lastname" value="<?=(isset($lastname) ? $lastname : "")?>"/>                            
                            	<br class="clearFloats"/>                            
                            </p>
                        
                        	<p>
                            	<label class="labelTitle">Phone*:</label>                            
                            	<input type="text" id="campContact" name="phone" value="<?=(isset($phone) ? $phone : "")?>"/>                            
                            	<br class="clearFloats"/>                            
                            </p>
                        
                       		<p>
                            	<label class="labelTitle">E-mail*:</label>
                            	<input type="text" id="campContact" name="email" value="<?=(isset($email) ? $email : "")?>"/>
                            	<br class="clearFloats"/>
                            </p>
                        
                        	<p>
                                <label class="labelTitle">Company:</label>
                                <input type="text" id="campContact" name="company" value="<?=(isset($company) ? $company : "")?>" />
                                <br class="clearFloats"/>
                            </p>
                            
                            <p>
                                <label class="labelTitle">Company's business field:</label>
                                <input type="text" id="campContact" name="domain_of_activity" value="<?=(isset($domainOfActivity) ? $domainOfActivity : "")?>"/>
                                <br class="clearFloats"/>
                            </p>
                            
                            <p>
                                <label class="labelTitle">Message here*:</label>
                                <textarea id="campMesaj" name="message"><?=(isset($message) ? $message : "")?></textarea>
                                <br class="clearFloats"/>
                            </p>
                            
                            <p>
                            	<label class="labelTitle">&nbsp;</label>
                                        <table cellpadding="0" cellspacing="2" border="0" width="95%">
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <span class="captchaText">
                                                    Please enter the code shown in the image
                                                    </span><br/>
                                                    <a href="contact.php">
                                                        If you cannot see the code in the image please click here
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" colspan="2" valign="middle">
                                                    <?
                                                        echo $captcha->display_captcha(true);                                                                            
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                        </table>                            
                            	<br class="clearFloats"/>
                            </p>
                            
                            <div class="btnTrimite">
                            	<input type="submit" name="submitBtn" value="send" id="btnSendMessage"/>
                            </div><!--ends btnTrimite-->
                            
                            <div class="atentieFormular">
                            	<p>
                                	(*) All fields marked with * are mandatory. Thank you!
                                </p>
                            </div><!--ends atentieFormular-->
                    
                </div>
            </form>
            </div><!--ends containerForm-->
            
            <div class="containerInfoContact">
           	  <h3>
                	Contact us             
              </h3>
                
                <p>
                	Mihai Viteazu Blv. nr.30, 300222, Timisoara, Romania                </p>
                
                <p>
                	Phone: +40 356.108.877                </p>
                
                <p>
                	Mobile: +40 726.727.724, +40 744.627.147, 
                    <br/>
                    +40 727.844.739                </p>
                
               	<p>
                	e-mail: office@globe-studios.com,
                    <br/>
                     www.globe-studios.com                </p>
            </div><!--ends containerInfoContact-->

            <br class="clearFloats"/>
            
            
        </div><!--ends wrapperMiddleFormularContact-->

    </div><!--ends containerMainFormularContact-->  

    <div class="backgroundSmokeFooter">    
    
    </div><!--ends backgroundSmokeFooter-->

    
</div><!--ends mainBox-->
</div><!--ends parentBox-->


</body>
</html>
