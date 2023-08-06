$(function () {
  let budgetForm = $("#budget-form");
  budgetForm.on("submit", function (e) {
    e.preventDefault();
    let budgetValue = $("#budget-input").val();
    if (acc.setBudget(budgetValue)) {
      $("#budget-amount").text(acc.budget);
      printBalance();
    } else {
      $("#budget-feedback").text("Value cannot be empty or negative.");
      $("#budget-feedback").show();
    }
    $("#budget-input").val("");
  });
  $("#expense-form").on("submit", function (e) {
    e.preventDefault();

    let expense = new Expense(
      parseInt($("#amount-input").val()),
      $("#expense-input").val()
    );
    if (!acc.addExpense(expense)) {
      $("#expense-feedback").text("Value cannot be empty or negative.");
      $("#expense-feedback").show();
    } else {
      acc.setTotalExpenses();
      printTable();
      acc.setBalance();
      printBalance();
      $("#expense-amount").text(acc.totalExpense);
    }
    $("#amount-input").val("");
    $("#expense-input").val("");
  });
  $("#budget-input").on("focus", focusHandler);
  $(".expense-input").on("focus", focusHandler);
});

class Budget {
  expenses = [];
  totalExpense = null;
  budget = null;
  balance = null;
  setBudget(budget) {
    if (budget != 0 && budget != "" && parseInt(budget) > 0) {
      this.budget = parseInt(budget);
      this.setBalance();
      return true;
    } else {
      return false;
    }
  }
  setBalance() {
    this.balance = this.budget - this.totalExpense;
  }
  setTotalExpenses() {
    this.totalExpense = 0;
    this.expenses.forEach((expense) => {
      this.totalExpense += expense.amount;
    });
    // this.totalExpense += expenseObject.amount
  }
  addExpense(expenseObject) {
    if (expenseObject.amount != 0 && !isNaN(expenseObject.amount)) {
      this.expenses.push(expenseObject);
      // this.setTotalExpenses(expenseObject)
      return true;
    } else {
      return false;
    }
  }
}
class Expense {
  constructor(_amount, _description) {
    this.amount = _amount;
    this.description = _description;
  }
}

let acc = new Budget();

function focusHandler() {
  if ($(this).hasClass("expense-input")) {
    $("#expense-feedback").hide();
  } else {
    $("#budget-feedback").hide();
  }
}
// delete Expense function
function deleteExpHandler(e) {
  e = $(this);
  let index = e.data("expense");
  acc.expenses.splice(index, 1);
  acc.setTotalExpenses();
  printTable();
  acc.setBalance();
  printBalance();
  $("#expense-amount").text(acc.totalExpense);
}
// set Color of Balance respectively
function printBalance() {
  if (acc.balance > 0) {
    $("#balance").removeClass("showGreen");
    $("#balance").removeClass("showBlack");
    $("#balance").addClass("showGreen");
    $("#balance-amount").text(acc.balance);
  } else if (acc.balance == 0) {
    // $('#balance').removeClass("showGreen")
    $("#balance").removeClass("showGreen");
    $("#balance").removeClass("showRed");
    $("#balance").addClass("showBlack");
    $("#balance-amount").text(acc.balance);
  } else if (acc.balance < 0) {
    $("#balance").removeClass("showGreen");
    $("#balance").removeClass("showBlack");
    $("#balance").addClass("showRed");
    $("#balance-amount").text(acc.balance);
  }
}
function editExpHandler(e) {
  let expAmount = $(this).parent().prevAll(".expense-amount").text();
  let expTitle = $(this)
    .parent()
    .prevAll(".expense-title")
    .text()
    .split("-")[1];
  let index = $(this).data("expense");

  $("#amount-input").val(expAmount);
  $("#expense-input").val(expTitle);
  acc.expenses.splice(index, 1);
  deleteExpHandler(e);
}

function printTable() {
  if (acc.expenses.length === 1) {
    $("#expensesTable").html(`
                <table class="table text-center ">
	                <thead>
		                <tr>
			                <th>Expense Title</th>
			                <th>Expense Amount</th>
		                </tr>
	                </thead>
                    <tbody id="expensesContent">
                    </tbody>
                </table>`);
  }
  $("#expensesContent").html("");
  for (let i = 0; i < acc.expenses.length; i++) {
    let Row = `
        <tr class="expense-item">
        <td class="expense-title ">- ${acc.expenses[i].description}</td>
        <td class="expense-amount">${acc.expenses[i].amount}</td>
        <td class="flex">
            <p class="edit-icon" data-expense="${i}">
                <i class="far fa-edit fa-1x"></i>
            </p>
            <p class="delete-icon" data-expense="${i}">
                 <i class="far fa-trash-alt fa-1x"></i>
             </p>
        </td>
        </tr>
        `;
    $("#expensesContent").append(Row);
  }
  $(".delete-icon").on("click", deleteExpHandler);
  $(".edit-icon").on("click", editExpHandler);
}
