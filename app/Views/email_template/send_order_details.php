<p>Bonjour <b><?php echo $user_data['customer_name']  ?></b></p> 
<p>Merci pour votre commande.</p>
<p> Si vous avez sélectionné la méthode de paiement par Airtel Money. </p>
<p>Votre commande restera en attente jusqu’à ce que
nous ayons confirmation du paiement via whatsapp.</p>
<p>Nos coordonnées Airtel Money :</p>

<p><b>Récapitulatif de la Commande</b></p>
<p>COMMANDE<b> N° <?php echo $order_data['order_number'] ?></b></p> 
<table>
  <?php $i = 0; foreach ($data['items'] as $item) : ?>
  <tr>
    <td><?php echo $item['name']  ?></td>
    <td>X<?php echo $item['quantity'] ?></td>
    <td><?php echo $item['price'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<p><b><?php echo $user_data['paiement_mode']  ?></b></p>
<p><b>Total <?php echo $order_data['order_total']  ?></b></p> 
<br>
<p>Contactez le service technique de BEAUTY FASHION, si vous n'êtes pas à l'origine de cette demande.</p>
                