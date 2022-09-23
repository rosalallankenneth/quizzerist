const addQuizForm = document.querySelector("#addQuizForm");

addQuizForm.addEventListener("submit", e => {
  e.preventDefault();

  const title = document.querySelector("#title").value;
  const desc = document.querySelector("#desc").value;
  const publish = document.querySelector("#publish").value;
  var questions = [];

  const questionsNodes = document.querySelectorAll(".question");
  questionsNodes.forEach(question => {
    const index = question.id.split("-")[1];
    var choices = [];

    const choicesNodes = document.querySelectorAll(`.c${index}`);

    choicesNodes.forEach(choice => {
      choices.push(choice.value);
    });

    const answer = document.querySelector(`.a${index}`).value;
    const remark = document.querySelector(`.r${index}`).value;

    questions.push({
      question: question.value,
      choices: JSON.stringify({ choices }),
      answer,
      remark
    });
  });

  const payload = {
    title,
    desc,
    questions,
    publish
  };

  console.log(payload);
  submitQuizInfo(payload);
});

const submitQuizInfo = payload => {
  axios
    .post("./server/createQuiz.php", JSON.stringify(payload))
    .then(res => handleSubmitResponse(res.data))
    .catch(err => console.error(err));
};

const handleSubmitResponse = response => {
  if (response.error) {
    alert(response.message);
  } else {
    alert(response.message);
    window.location = "./index.php";
  }
};
