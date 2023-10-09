<script>
  const getElement = (value) => {
    return document.querySelector('#' + value);
  }

  const id = getElement('id');
  const name = getElement('name');

  window.onclick = (e) => {
    try {
      const toggleModal = document.querySelector('#' + e.target.id);

      if (toggleModal.id.split('-')[0] === 'updateModal') {
        id.value = toggleModal.getAttribute('data-modal-id');
        name.value = toggleModal.getAttribute('data-modal-name');
      }
    } catch (e) {}
  }
</script>
