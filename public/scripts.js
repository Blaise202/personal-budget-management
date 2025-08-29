// Show withdraw/deposit form
function showForm(type) {
  document.getElementById('withdraw-form').style.display = (type === 'withdraw') ? 'block' : 'none';
  document.getElementById('deposit-form').style.display = (type === 'deposit') ? 'block' : 'none';
}

// Close modal
function closeModal() {
  document.querySelectorAll('.modal').forEach(m => m.style.display = 'none');
}

// Open edit modal
function openEditModal(transactionId) {
  const modal = document.getElementById('editModal');
  let editForm = document.getElementById('editTransactionForm');
  modal.style.display = 'flex';
  editForm.action = "/update/" + transactionId;

  // Example: attach transaction id to modal for saving
  modal.dataset.transactionId = transactionId;

  // Populate with current amount (you might fetch via Ajax)
  let transaction = document.getElementById(transactionId);
  if (transaction) {
    let amountText = transaction.querySelector('.transaction-info span').innerText;
    document.getElementById('edit-amount').value = amountText.match(/\\d+/)[0];
  }

  document.getElementById('saveEditBtn').onclick = function () {
    let newAmount = document.getElementById('edit-amount').value;
    // Example update on DOM
    let info = transaction.querySelector('.transaction-info span');
    info.innerText = info.innerText.replace(/\\$\\d+/, `$${newAmount}`);
    closeModal();
  };
}

// Open delete modal
function deleteModal(transactionId) {
  const modal = document.getElementById('deleteModal');
  let deleteForm = document.getElementById('deleteTransactionForm');
  deleteForm.action = "/delete/" + transactionId;
  modal.style.display = 'flex';
  modal.dataset.transactionId = transactionId;

  modal.querySelector('button.save-btn').onclick = function () {
    let transaction = document.getElementById(transactionId);
    if (transaction) transaction.remove();
    closeModal();
  };
}
