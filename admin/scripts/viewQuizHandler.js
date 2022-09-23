const quizID = document.querySelector("#quizID").value;

const getQuizInfo = id => {
  axios
    .get(`./server/getOneQuiz.php?id=${id}`)
    .then(res => displayQuizInfo(res.data))
    .catch(err => console.error(err));
};

const displayQuizInfo = data => {
  document.querySelector("#bc-title").textContent = data.title;
  document.querySelector("#title").textContent = data.title;
  document.querySelector("#desc").textContent = data.description;
  document.querySelector("#author").textContent = data.author_ID;

  document.querySelector("#dateCreated").textContent = formatDate(
    data.date_created
  );

  axios
    .get(`./server/getQuestions.php?id=${quizID}`)
    .then(res => displayQuestions(res.data))
    .catch(err => console.error(err));
};

const displayQuestions = data => {
  var total = 0;
  var index = 0;

  data.map(q => {
    total += parseInt(q.remark);
    index++;
    const pointsSuffix = parseInt(q.remark) > 1 ? "pts" : "pt";

    const choices = JSON.parse(q.choices);
    const listChoices = choices.choices;

    const questionsTemplate = `
      <div class="px-3">

        <div class="questionContainer">
          <div class="number">${index}.</div>
          <div class="question">${q.question}</div>
          <div class="remark">(${q.remark + pointsSuffix})</div>
        </div>
        
        <p class="container mb-0">Answer: ${listChoices[q.answer - 1]}</p>
        <div class="container choicesContainer p-3">

          <label class="choiceContainer">
            <input type="radio" name="${index}-1" id="q${index}c1" disabled>
            <p>${listChoices[0]}</p>
          </label>
          
          <label class="choiceContainer">
            <input type="radio" name="${index}-2" id="q${index}c2" disabled>
            <p>${listChoices[1]}</p>
          </label>
          
          <label class="choiceContainer">
            <input type="radio" name="${index}-3" id="q${index}c3" disabled>
            <p>${listChoices[2]}</p>
            </label>
          
          <label class="choiceContainer">
            <input type="radio" name="${index}-4" id="q${index}c4" disabled>
            <p>${listChoices[3]}</p>
            </label>

        </div>
      </div>
    `;

    const questionsPane = document.querySelector("#questions-pane");
    questionsPane.insertAdjacentHTML("beforeend", questionsTemplate);
  });

  document.querySelector("#total-items").textContent = `${data.length} items`;
  document.querySelector("#total-points").textContent = `${total}pts`;
};

getQuizInfo(quizID);

function formatDate(inputDate) {
  var date = new Date(inputDate);
  if (!isNaN(date.getTime())) {
    return (
      date.getMonth() + 1 + "/" + date.getDate() + "/" + date.getFullYear()
    );
  }
}
