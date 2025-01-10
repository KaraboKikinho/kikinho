
<h1 id='email-heading' class='title mt-5'>Send an email</h1>

<?php if(isset($sending)){ ?>
	<p class='emailMsg text-danger' id='emailNotification'><?= $sending; ?></p>
<?php
}
?>

	
	
	<article class="container my-2 email-container">
		<p id='required_fields'>Required fileds <span class='text-danger'>*</span></p>
    <div class="row">
        <div class="col emailContainer">
            <form method="POST" action="/emails" id="email-ajax-form">
                <div class="form-group">
                    <label for="name" class="sub-heading text-uppercase fw-bold">Your Name <span class='text-danger'>*</span></label>
                    <div class="input-group">
                        <input name="name" id="name" class="form-control" type="text" required placeholder="Example: John Smith" pattern="[A-Za-z\s]{1,50}" maxlength="50" title="Only letters and spaces allowed, up to 50 characters">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                        </div>
                    </div>
					<?php if(isset($name_err)){ ?>
                    <p class="text-danger text-center name-err mt-1"><?= $name_err; ?></p>
					<?php
					}
					else{ ?>
						<p class="text-danger text-center name-err mt-1"></p>
					<?php
					}
					?>
                </div>

                <div class="form-group my-2">
                    <label for="number" class="sub-heading text-uppercase fw-bold">Your Contact Number <span class='text-danger'>*</span></label>
                    <div class="input-group">
                        <input name="number" id="number" class="form-control" type="tel" placeholder="Example: 0712345678" title="Enter a valid phone number (10-13 digits)" maxlength="13" pattern="/\d+{10,13}">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi bi-telephone"></i>
                            </span>
                        </div>
                    </div>
					<?php if(isset($number_err)){ ?>
                    <p class="text-danger text-center number-err mt-1"><?= $number_err; ?></p>
					<?php
					}
					else{ ?>
						<p class="text-danger text-center number-err mt-1"></p>
					<?php 
					}
					?>
					
					<?php if(isset($email_number_err)){ ?>
                    <p class="text-danger text-center email-number-err"><?= $email_number_err; ?></p>
					<?php
					}
					else{ ?>
						<p class="text-danger text-center email-number-err"></p>
						<?php
					}
					?>
                </div>

                <div class="form-group">
                    <label for="email" class="sub-heading text-uppercase fw-bold">Your Email Address</label>
                    <div class="input-group">
                        <input name="email" id="email" class="form-control" type="email" placeholder="Example: johnSmith@gmail.com" maxlength="100">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                        </div>
                    </div>
					<?php if(isset($email_err)){ ?>
                    <p class="text-danger text-center email-err mt-1"><?= $email_err; ?></p>
					<?php 
					}
					else{ ?>
						<p class="text-danger text-center email-err mt-1"></p>
					<?php
					}
					
					if(isset($email_number_err)){ ?>
                    <p class="text-danger text-center email-number-err mt-1"><?= $email_number_err; ?></p>
					<?php
					}
					else{ ?>
						 <p class="text-danger text-center email-number-err mt-1"></p>
						<?php
					}
					?>
                </div>

                <div class="form-group email-subject">
                    <label for="subject" class="sub-heading form-label text-uppercase fw-bold">		What is your message about 
						<span class='text-danger'>*</span>
					</label>
                    <div class="input-group">
                        <input name="subject" id="subject" class="form-control" type="text" placeholder="Example: Web Applications" maxlength="200" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi bi-book"></i>
                            </span>
                        </div>
                    </div>
					<?php if(isset($subject_err)){ ?>
                    <p class="text-danger text-center subject-err mt-1"><?= $subject_err; ?></p>
					<?php
					}else{ ?>
						<p class="text-danger text-center subject-err mt-1"></p>
						<?php
					}
					?>
                </div>

                <div class="form-group mb-5">
                    <label for="message" class="sub-heading form-label text-uppercase fw-bold">Write your message <span class='text-danger'>*</span></label>
                    <div class="input-group">
                        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                        <span class="input-group-text">
                            <i class="bi bi-pen"></i>
                        </span>
                    </div>
					<?php if(isset($message_err)){ ?>
                    <p class="mt-3 mb-2 text-danger text-center message-err mt-1"><?= $message_err; ?></p>
					<?php
					}else{ ?>
						<p class="mt-3 mb-2 text-danger text-center message-err mt-1"></p>
					<?php 
					}
					?>
                    <p class="responseFromEmail"></p>
                </div>

                <div class="form-group sendEmail mt-3 text-center">
                    <button name="emailButton" id="emailBtn" class="btn btn-success btn-rounded" maxlength="500" required pattern="/^[A-Za-z0-9\s.,!?]+$/"
                        title="Keep your message under 500 words">Send your message</button>
                </div>
            </form>
        </div>
    </div>
</article>