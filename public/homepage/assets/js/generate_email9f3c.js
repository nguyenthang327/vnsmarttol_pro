$('#generate_email').click(function() {
  const baseMail = 'user';
  $(this).closest('form').find('[name=email]').val(baseMail + '+' + + new Date() + '@gmail.com');
});