const question = document.querySelector("div #question-content");
console.log(question);

function div() {
  return document.createElement("div");
}

function input(className, type, name, placeholder, id) {
  const input = document.createElement("input");
  input.className = className;
  input.type = type;
  input.name = name;
  input.placeholder = placeholder;
  input.id = id;
  return input;
}

function tambahPertanyaan() {
  pertanyaan++;
  const jmlPertanyaan = pertanyaan;
  const elemnt = document.createElement("div");
  elemnt.className = "question";
  // Delete Button
  const deleteContainer = div();
  deleteContainer.className = "end-container";
  const delBtn = deleteContainer.appendChild(document.createElement("a"));
  delBtn.className = "button2";
  delBtn.setAttribute("onclick", "deleteQuestion(this)");
  delBtn.appendChild(document.createTextNode("Delete"));
  elemnt.appendChild(deleteContainer);
  // Judul
  const judul = input(
    "title",
    "text",
    "pertanyaan" + jmlPertanyaan,
    "Masukan pertanyaan",
    ""
  );
  elemnt.appendChild(judul);
  // Pilihan a
  const pilihana = div();
  pilihana.className = "pilihan";
  const labela = document.createElement("label");
  labela.setAttribute("for", "0" + jmlPertanyaan);
  labela.appendChild(document.createTextNode("A "));
  const inputa = input(
    "",
    "text",
    "pilihan0" + jmlPertanyaan,
    "Masukan opsi A",
    "0" + jmlPertanyaan
  );
  pilihana.appendChild(labela);
  pilihana.appendChild(inputa);
  elemnt.appendChild(pilihana);
  // Pilihan b
  const pilihanb = div();
  pilihanb.className = "pilihan";
  const labelb = document.createElement("label");
  labelb.setAttribute("for", "1" + jmlPertanyaan);
  labelb.appendChild(document.createTextNode("B "));
  const inputb = input(
    "",
    "text",
    "pilihan1" + jmlPertanyaan,
    "Masukan opsi B",
    "1" + jmlPertanyaan
  );
  pilihanb.appendChild(labelb);
  pilihanb.appendChild(inputb);
  elemnt.appendChild(pilihanb);
  // Pilihan c
  const pilihanc = div();
  pilihanc.className = "pilihan";
  const labelc = document.createElement("label");
  labelc.setAttribute("for", "2" + jmlPertanyaan);
  labelc.appendChild(document.createTextNode("C "));
  const inputc = input(
    "",
    "text",
    "pilihan2" + jmlPertanyaan,
    "Masukan opsi c",
    "2" + jmlPertanyaan
  );
  pilihanc.appendChild(labelc);
  pilihanc.appendChild(inputc);
  elemnt.appendChild(pilihanc);
  // Pilihan D
  const pilihand = div();
  pilihand.className = "pilihan";
  const labeld = document.createElement("label");
  labeld.setAttribute("for", "3" + jmlPertanyaan);
  labeld.appendChild(document.createTextNode("D "));
  const inputd = input(
    "",
    "text",
    "pilihan3" + jmlPertanyaan,
    "Masukan opsi d",
    "3" + jmlPertanyaan
  );
  pilihand.appendChild(labeld);
  pilihand.appendChild(inputd);
  elemnt.appendChild(pilihand);

  question.appendChild(elemnt);
  console.log(elemnt);
}
