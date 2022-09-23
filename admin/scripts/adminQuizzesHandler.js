// FUNCTION THAT FETCHES ALL QUIZ RECORDS FROM THE DATABASE
function getQuizzes() {
  axios
    .get("./server/getQuizzes.php")
    .then(res => generateQuizCards(res.data))
    .catch(err => console.error(err));
}

const generateQuizCards = data => {
  data.map(quiz => {
    getTotals(quiz, quiz.quiz_ID);
  });
};

function getTotals(quiz, id) {
  axios
    .get(`./server/getQuestions.php?id=${id}`)
    .then(res => {
      const date = formatDate(quiz.date_created);
      const published = quiz.published == 0 ? "Unpublished" : "Published";
      let totalItems = res.data.length;
      let totalPts = 0;

      res.data.map(data => {
        totalPts += parseInt(data.remark);
      });

      const cardTemplate = `
      <div id="card-${quiz.quiz_ID}" class="card mt-4">
        <div class="card-header">
          <h4 class="card-title mb-0 text-theme">${quiz.title}</h4>
        </div>
        <div class="card-body">
          <h6 class="card-title">
            By ${quiz.author_ID} | <span class="font-weight-normal"> Created on ${date}</span>
            <small><span id="txt-published" class="ml-2 p-1 bg-success text-light text-sm">${published}</span></small>
          </h6>
          <p class="card-text">${quiz.description}</p>

          <div class="card-form-group">
            <p class="font-weight-bold mb-0">${totalItems} items <span class="font-weight-normal">|</span> ${totalPts}pts</p>
            <a id="btn-${quiz.quiz_ID}" href="./server/setViewQuizSession.php?id=${quiz.quiz_ID}" class="btn bg-theme">View Quiz</a>
          </div>
        </div>
      </div>
    `;

      const quizContainer = document.querySelector(".quizListContainer");
      quizContainer.insertAdjacentHTML("beforeend", cardTemplate);
    })
    .catch(err => console.error(err));
}

function formatDate(inputDate) {
  var date = new Date(inputDate);
  if (!isNaN(date.getTime())) {
    return (
      date.getMonth() + 1 + "/" + date.getDate() + "/" + date.getFullYear()
    );
  }
}
