document.querySelector('#contact-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const code = document.getElementById('code').value;
    const message = document.getElementById('message').value;
    const form = document.getElementById('contact-form');
    const file = document.getElementById('file').files[0];
    const errorMessage = document.getElementById('alert-message');
    
    if (!name || !code || !file) {
      errorMessage.classList.add("alert",'alert-danger');
      errorMessage.textContent = 'Veuillez remplir tous les champs obligatoires.';
      return;
    }
  
    const formData = new FormData();
    formData.append('name', name);
    formData.append('code', code);
    formData.append('message', message);
    formData.append('file', file);
  
    fetch(form.action, {
      method: form.method,
      body: formData,
    })
      .then(response => {
        if (response.ok) {
          errorMessage.classList.remove("alert",'alert-danger');
          errorMessage.classList.add("alert", 'alert-success');
          errorMessage.textContent = 'Message envoyé avec succès !';
          form.reset();
        } else {
          throw new Error('Une erreur s\'est produite lors de l\'envoi du message. Veuillez réessayer plus tard.');
        }
      })
      .catch(error => {
        errorMessage.classList.add("alert",'alert-danger');
        errorMessage.textContent = error.message;
      });
  });
  
  $('#exampleModal').on('hidden.bs.modal', function () {
    $('#contact-form').trigger('reset');
  });
  