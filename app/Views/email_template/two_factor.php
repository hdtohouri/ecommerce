<p>Bonjour <b><?php echo $user_fullname ?></b></p> 
<p>Le code pour se connecter à votre compte Beauty Fashion est :</p>
<p> <b><?php echo $code ?></b></p> 
<p>Cliquez sur le bouton pour vous connecter.</p>
<a href= "<?php echo base_url() . 'common/twofactor/login/' . $token; ?>" style="color: white; 
  border: none;padding: 10px 24px;
 background-color: #008CBA;display:inline-block; text-decoration:none;
 border-raduis:3px; box-shadow:0 2px 3px rgb(0,0,0,0.16);
 text-align: center;font-size: 16px;margin: 4px 2px;">Se Connecter</a>
<br><br>
<b>NB: Ce lien est valide pour 10 minutes.</b>
<br>
<p>Contactez le service technique de BEAUTY FASHION, si vous n'êtes pas à l'origine de cette demande.</p>
                