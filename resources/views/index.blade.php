<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta content="width=device-width, initial-scale=1.0" name="viewport">
 <title>Money Tracker</title>
</head>
<link href="{{ asset('styles.css') }}" rel="stylesheet">

<body>
 <div class="left">
  <h3>Amount remaining to - $3,500</h3>
  <div class="amount-big">$ {{ number_format(3500 - $deposits + $withdraws) }}</div>

  <div class="bottom-section">
   <h3>Amount Reached so far</h3>
   <div class="amount-small">$ {{ number_format($deposits - $withdraws) }}</div>
  </div>
 </div>

 <div class="right">
  <h3><u>Add Transaction</u></h3>
  <div class="transaction-btns">
   <button class="btn btn-withdraw" onclick="showForm('withdraw')">Withdraw</button>
   <button class="btn btn-deposit" onclick="showForm('deposit')">Deposit</button>
  </div>

  <div class="form-section" id="withdraw-form">
   <form action="{{ route('create', 'withdraw') }}" method="post">
    @csrf
    <input max="{{ $deposits - $withdraws }}" min="1" name="amount" placeholder="Enter withdraw amount..." required type="number">
    <button class="save-btn">Save Withdraw</button>
   </form>
  </div>

  <div class="form-section" id="deposit-form">
   <form action="{{ route('create', 'deposit') }}" method="post">
    @csrf
    <input min="1" name="amount" placeholder="Enter deposit amount..." required type="number">
    <button class="save-btn">Save Deposit</button>
   </form>
  </div>
  <h3 style="margin-top: 20px;"><u>Past Transactions</u></h3>
  <div class="transactions-container rounded border p-3">
   <div class="transactions">
    @foreach ($transactions as $transaction)
     @if ($transaction->type == 'deposit')
      <div class="transaction-item deposit">
       <div class="transaction-info">
        <span>+ ${{ $transaction->amount }} (Deposit)</span>
        <small>2025-08-24</small>
       </div>
       <div class="transaction-actions">
        <div class="transaction-actions">
         <button class="edit-btn" onclick="openEditModal('{{ $transaction->id }}')">Edit</button>
         <button class="delete-btn" onclick="deleteModal('{{ $transaction->id }}')">Delete</button>
        </div>
       </div>
      </div>
     @else
      <div class="transaction-item withdraw">
       <div class="transaction-info">
        <span>- ${{ $transaction->amount }} (Withdraw)</span>
        <small>2025-08-25</small>
       </div>
       <div class="transaction-actions">
        <div class="transaction-actions">
         <button class="edit-btn" onclick="openEditModal('{{ $transaction->id }}')">Edit</button>
         <button class="delete-btn" onclick="deleteModal('{{ $transaction->id }}')">Delete</button>
        </div>
       </div>
      </div>
     @endif
    @endforeach

   </div>
   <div class="modal" id="editModal">
    <div class="modal-content">
     <button class="close-btn" onclick="closeModal()">X</button>
     <h3>Edit Transaction</h3>
     <form action="" id="editTransactionForm" method="POST">
      @csrf
      @method('PUT')
      <input id="edit-amount" name="amount" placeholder="Enter new amount" type="text">
      <button class="save-btn" id="saveEditBtn">Save</button>
     </form>
    </div>
   </div>
   <div class="modal" id="deleteModal">
    <div class="modal-content">
     <button class="close-btn" onclick="closeModal()">X</button>
     <h3>delete Transaction</h3>
     <form action="" id="deleteTransactionForm" method="POST">
      @csrf
      @method('DELETE')
      <i>are you sure you want to delete this transaction?</i>
      <button class="save-btn" id="saveEditBtn">Confirm</button>
     </form>
    </div>
   </div>

  </div>
</body>

</html>
<script src="{{ asset('scripts.js') }}"></script>
