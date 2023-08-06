$(function () {
  let budgetForm = $("#budget-form");
  budgetForm.on("submit", function (e) {
    e.preventDefault();
    let budgetValue = $("#budget-input").val();
    if (acc.setBudget(budgetValue)) {
      $("#budget-amount").text(acc.budget);
      renderBalance();
    } else {
      $("#budget-feedback").text("Value cannot be empty or negative.");
      $("#budget-feedback").show();
    }
    $("#budget-input").val("");
  });
  $("#expense-form").on("submit", function (e) {
    e.preventDefault();

    let expense = new Cost(
      parseInt($("#amount-input").val()),
      $("#expense-input").val()
    );
    if (!acc.addExpense(expense)) {
      $("#expense-feedback").text("Value cannot be empty or negative.");
      $("#expense-feedback").show();
    } else {
      acc.setTotalExpenses();
      renderTable();
      acc.setBalance();
      renderBalance();
      $("#expense-amount").text(acc.total);
    }
    $("#amount-input").val("");
    $("#expense-input").val("");
  });
  $("#budget-input").on("focus", focusHandler);
  $(".expense-input").on("focus", focusHandler);
});

class Calc {
  expenses = [];
  total = null;
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
    this.balance = this.budget - this.total;
  }
  setTotalExpenses() {
    this.total = 0;
    this.expenses.forEach((expense) => {
      this.total += expense.amount;
    });
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
class Cost {
  constructor(_amount, _description) {
    this.amount = _amount;
    this.description = _description;
  }
}

let acc = new Calc();
function delExpHandler(e) {
  e = $(this);
  let index = e.data("expense");
  acc.expenses.splice(index, 1);
  acc.setTotalExpenses();
  renderTable();
  acc.setBalance();
  renderBalance();
  $("#expense-amount").text(acc.total);
}

function focusHandler() {
  if ($(this).hasClass("expense-input")) {
    $("#expense-feedback").hide();
  } else {
    $("#budget-feedback").hide();
  }
}
function renderBalance() {
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
  delExpHandler(e);
}
function renderTable() {
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
        <td class="expense-title ">-${acc.expenses[i].description}</td>
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
  $(".delete-icon").on("click", delExpHandler);
  $(".edit-icon").on("click", editExpHandler);
}
