var number = 1;
const btnDeleteQuestion = document.querySelector("#btn-deleteQuestion");

btnDeleteQuestion.setAttribute("disabled", true);

document.querySelector("#btn-addQuestion").addEventListener("click", () => {
  number++;
  const questionHtml = `
    <div class="questionWrap">
      <div class="form-group">
        <label for="question" class="form-label font-weight-bold">Question #${number}</label>
        <input id="q-${number}" type="text" class="form-control question" required>
      </div>
      <div class="container">
        <div class="form-group">
          <label for="choice" class="form-label">Choices</label>
          <input type="text" class="form-control choice c${number}" placeholder="Choice 1" required>
          <input type="text" class="form-control choice c${number}" placeholder="Choice 2" required>
          <input type="text" class="form-control choice c${number}" placeholder="Choice 3" required>
          <input type="text" class="form-control choice c${number}" placeholder="Choice 4" required>
        </div>
        <div class="form-group answerContainer">
          <label for="choice" class="form-label">Answer</label>
          <select class="form-control answer a${number}">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>

          <label for="choice" class="form-label">Remark</label>
          <input type="number" class="form-control remark r${number}" placeholder="Enter a value in digits" required>
        </div>
      </div>
    </div>
  `;

  const questions = document.querySelectorAll(".questionWrap");
  const lastQuestionNode = questions[questions.length - 1];

  lastQuestionNode.insertAdjacentHTML("afterend", questionHtml);
  btnDeleteQuestion.disabled = false;
});

btnDeleteQuestion.addEventListener("click", () => {
  if (number > 1) {
    const questions = document.querySelectorAll(".questionWrap");
    const lastQuestionNode = questions[questions.length - 1];

    lastQuestionNode.remove();
    number--;
    if (number < 2) {
      btnDeleteQuestion.setAttribute("disabled", true);
    }
  }
});
