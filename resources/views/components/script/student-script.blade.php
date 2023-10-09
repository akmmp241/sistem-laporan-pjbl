<script>
  const getElement = (value) => {
    return document.querySelector('#' + value);
  }

  const id = getElement('id');
  const name = getElement('name');
  const nis = getElement('nis');
  const Class = getElement('class');
  const dudi = getElement('dudi');
  const supervisor = getElement('supervisor');

  window.onclick = e => {
    try {
      const toggleModal = document.querySelector('#' + e.target.id);

      if (toggleModal.id.split('-')[0] === 'updateModal') {
        id.value = toggleModal.getAttribute('data-modal-id');
        name.value = toggleModal.getAttribute('data-modal-name');
        nis.value = toggleModal.getAttribute('data-modal-nis');
        Class.value = toggleModal.getAttribute('data-modal-class');
        dudi.value = toggleModal.getAttribute('data-modal-dudi');
        supervisor.value = toggleModal.getAttribute('data-modal-supervisor');
      }
    } catch (e) {
    }
  }
</script>
