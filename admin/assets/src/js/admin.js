document.addEventListener("DOMContentLoaded", function () {
  document.getElementById('save_scc_address').addEventListener('click', function(e){
    let address = document.getElementById('scc-address').value;
    let nonce = document.getElementById('_wpnonce').value;
    var formData = new FormData();
    formData.append('action', 'mtrt_validate_address');
    formData.append('nonce', nonce);
    formData.append('address', address);
    fetch(ajaxurl, {
      method: 'post',
      body: formData,
    }).then(res => res.json())
      .then(res => {
        let messageArea = document.getElementById('scc-message-area');
        messageArea.innerHTML = '';
        messageArea.innerHTML = res.data;
        if(!res.success) {
          messageArea.style.color = 'red';
        } else {
          messageArea.style.color = 'green';
          let img = document.createElement('img');
          img.id = 'scc-identicon';
          img.src = 'https://id.lobstr.co/' + address;
          document.getElementById('scc-message-area').insertAdjacentElement('beforeBegin', img)
        }

      });
  });
});
