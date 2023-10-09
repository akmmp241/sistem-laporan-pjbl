<script>
  const getElement = (value) => {
    return document.querySelector('#' + value);
  };

  const id = getElement('id');
  const name = getElement('name');
  const nip = getElement('nip')

  window.onclick = (e) => {
    try {
      const toggleModal = getElement(e.target.id);

      if (toggleModal.id.split('-')[0] === "updateModal") {
        id.value = toggleModal.getAttribute('data-modal-id');
        name.value = toggleModal.getAttribute('data-modal-name');
        nip.value = toggleModal.getAttribute('data-modal-nip');
      }
    } catch (e) {
    }
  }
</script>
