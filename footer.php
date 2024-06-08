
<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">info@example.com</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">+7 495 695 37 76</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">г. Новосибирск</a></li>
   
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">ул. Пресненская наб., 12</a></li>
       </ul>
    <p class="text-center text-body-secondary">© 2024 Стоматологическая клиника "Здоровая улыбка"</p>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('Nice, you triggered this alert message!', 'success')
  })
}
</script>
<script>
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!document.getElementById('agree').checked) {
                event.preventDefault();
                alert('Вы должны согласиться с обработкой персональных данных');
            }
        });
    </script>    
</body>
</html>