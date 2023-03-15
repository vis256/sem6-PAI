const isEmpty = (val) => val.length === 0;

const isWhiteSpaceOrEmpty = (str) => /^[\s\t\r\n]*$/.test(str);

function validate(form) {
  const els = [
    {
      fieldName: "f_imie",
      errorMsg: "Podaj imie",
      validator: checkStringAndFocus,
    },
    {
      fieldName: "f_nazwisko",
      errorMsg: "Podaj nazwisko",
      validator: checkStringAndFocus,
    },
    {
      fieldName: "f_kod",
      errorMsg: "Podaj kod pocztowy",
      validator: checkStringAndFocus,
    },
    {
      fieldName: "f_miasto",
      errorMsg: "Podaj miasto",
      validator: checkStringAndFocus,
    },
    {
      fieldName: "f_ulica",
      errorMsg: "Podaj ulice",
      validator: checkStringAndFocus,
    },
    {
      fieldName: "f_email",
      errorMsg: "Podaj adres e-mail",
      validator: checkEmailAndFocus,
    },
  ];

  const getElem = (fieldName) => form.elements[fieldName];

  if (els.some((e) => !e.validator(getElem(e.fieldName), e.errorMsg)))
    return false;

  return true;
}

function checkEmail(str, errorMsg) {
  let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
  if (email.test(str)) return true;
  else return false;
}

function checkString(string, errorMsg) {
  if (isWhiteSpaceOrEmpty(string)) {
    alert(errorMsg);
    return false;
  }

  return true;
}

function checkStringAndFocus(obj, msg) {
  console.log({ obj, msg });
  let str = obj.value;
  let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
  if (isWhiteSpaceOrEmpty(str)) {
    document.getElementById(errorFieldName).innerHTML = msg;
    obj.focus();
    return false;
  } else {
    document.getElementById(errorFieldName).innerHTML = "";
    return true;
  }
}

function checkEmailAndFocus(obj, msg) {
  let str = obj.value;
  let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
  if (!checkEmail(str)) {
    document.getElementById(errorFieldName).innerHTML = msg;
    obj.focus();
    return false;
  } else {
    document.getElementById(errorFieldName).innerHTML = "";
    return true;
  }
}

function showElement(e) {
  document.getElementById(e).style.visibility = "visible";
}
function hideElement(e) {
  document.getElementById(e).style.visibility = "hidden";
}

function alterRows(i, e) {
  if (e) {
    if (i % 2 == 1) {
      e.setAttribute("style", "background-color: Aqua;");
    }
    e = e.nextSibling;
    while (e && e.nodeType != 1) {
      e = e.nextSibling;
    }
    alterRows(++i, e);
  }
}

alterRows(1, document.getElementsByTagName("tr")[0]);

function nextNode(e) {
  while (e && e.nodeType != 1) {
    e = e.nextSibling;
  }
  return e;
}
function prevNode(e) {
  while (e && e.nodeType != 1) {
    e = e.previousSibling;
  }
  return e;
}
function swapRows(b) {
  let tab = prevNode(b.previousSibling);
  let tBody = nextNode(tab.firstChild);
  let lastNode = prevNode(tBody.lastChild);
  tBody.removeChild(lastNode);
  let firstNode = nextNode(tBody.firstChild);
  tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
  if (form.value.length > maxSize)
    form.value = form.value.substring(0, maxSize);
  else msg.innerHTML = maxSize - form.value.length;
}
