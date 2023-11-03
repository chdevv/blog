const form = document.querySelector("form")
const input = document.querySelector(".input-title-new")
const textarea = document.querySelector(".textarea-conteudo")
const btnSubmit = document.querySelector(".btn-submit")

async function conectionForNewPost(){
  
  data = {
    "titulo": input.value,
    "conteudo": textarea.value
  }
  response = await fetch("/admin/newPost", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
    'Content-Type': 'application/json'
    }
  })
  const result = await response.json();
  if(result.resultModify == 1){
    alert("Nova Postagem criada com sucesso")
  }else{
    alert("Postagem não pode ser criada, tente novamente")
  }
}


document.addEventListener("keypress", (event) =>{
  if(event.key  == "Enter"){
    btnSubmit.click()
  }
})


form.addEventListener("submit", (target) =>{
  target.preventDefault();
  conectionForNewPost()
})