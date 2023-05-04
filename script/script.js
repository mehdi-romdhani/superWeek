window.addEventListener("DOMContentLoaded", () => {
  // alert('lol');
  const btnShowUser = document.querySelector("#btn_all_user");
  const btnShowBook = document.querySelector("#btn_all_book");
  const formUserId = document.querySelector("#form_user");
  const formBookId = document.querySelector('#form_book');
  const inputUserId = document.querySelector("#user_id");
  const inputBookId = document.querySelector("#book_id");


  const divInsertUser = document.createElement("div");
  const divInsertBook = document.createElement("div");
  const divUserID = document.createElement("div");
  const divBookID = document.createElement("div");

  // divInsertBook.setAttribute('class');
  divInsertBook.className = "book";
  divUserID.className = "user_id";
  divBookID.className = "book_id"

  const pageUser = async () => {
    const getUrl = await fetch("./users");
    const response = await getUrl.json();
    console.log(response);
    document.body.appendChild(divInsertUser);
    for (const res of response) {
      const divUser = document.createElement("div");
      divInsertUser.append(divUser);
      divUser.innerHTML = `<h1>${res.email}</h1><hr>`;
      console.log(res);
    }
  };

  const bookUser = async () => {
    const urlBook = await fetch("./books");
    const getBook = await urlBook.json();
    document.body.append(divInsertBook);
    for (const book of getBook) {
      const divBook = document.createElement("div");
      divInsertBook.className = "each_book";
      divInsertBook.appendChild(divBook);
      divBook.innerHTML =
        `<h1>${book.titre}</h1>` + `<p>${book.content}</p><hr>`;
    }
  };

  const getUserID = async () => {
    const urlUserID = await fetch("./users/" + inputUserId.value);
    const getUserInfo = await urlUserID.json();
    document.body.append(divUserID);
    const p = document.createElement("p");
    divUserID.appendChild(p);
    p.innerText = `${getUserInfo.id} - ${getUserInfo.email} - ${getUserInfo.first_name} - ${getUserInfo.last_name}`;

    console.log(getUserInfo);
  };

  const getBookID = async () => {
    const urlBookID = await fetch("./books/" + inputBookId.value);
    const getBookInfo = await urlBookID.json();
    document.body.append(divBookID);
    const p = document.createElement("p");
    divBookID.appendChild(p);
    p.innerHTML = `${getBookInfo.id}` + `- ${getBookInfo.titre}` + "<hr>" +`${getBookInfo.content}`;

    console.log(getBookInfo);
  };

  formBookId.addEventListener('click',async(e)=>{
    e.preventDefault();
    // console.log(inputBookId.value);
    await getBookID();
  })                                                                                                                                 

  formUserId.addEventListener("submit", async (e) => {
    e.preventDefault();
    console.log(inputUserId.value);
    await getUserID();
  });

  btnShowUser.addEventListener("click", async () => {
    await pageUser();
  });

  btnShowBook.addEventListener("click", async () => {
    await bookUser();
  });
});
