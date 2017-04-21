<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/simple-php-contact-form.html
*/
require_once("./include/fgcontactform.php");

$formproc = new FGContactForm();


//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('lee.chan.x3@gmail.com'); //<<---Put your email address here


//2. For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('oVYs3ZwrZY8y49i');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>
<html>
<body>
<!-- Form Code Start -->
<form id='contactus' class="topBefore" action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

<div class='short_explanation'>* Preenchimento obrigatório</div>

<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
<input id="name" type="text" placeholder="NAME" value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
    <span id='contactus_name_errorloc' class='error'></span>

<input id="email" type="text" placeholder="E-MAIL" value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='contactus_email_errorloc' class='error'></span>

<span id='contactus_message_errorloc' class='error'></span>
<textarea id="message" type="text" placeholder="MESSAGE"><?php echo $formproc->SafeDisplay('message') ?></textarea>

  <input id="submit" type="submit" value="ENVIAR!">
</form>


</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Por favor, digite seu nome");

    frmvalidator.addValidation("email","req","Por favor, digite seu email");

    frmvalidator.addValidation("email","email","Por favor, digite um endereço válido de e-mail");

    frmvalidator.addValidation("message","maxlen=2048","A mensagem é muito longa!(mais de 2KB!)");
// ]]>
</script>

</body>
</html>