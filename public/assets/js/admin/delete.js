const btns = document.querySelectorAll(".btn-delete")
  
async function POST(urlDinamic,method,data, btn){
  response = await fetch(urlDinamic, {
    method: method,
    body: JSON.stringify(data),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  const result = await response.json();
  const btnGrandFather = btn.parentElement.parentElement
  btnGrandFather.style.display = "none"
}
btns.forEach(btn => {
  btn.addEventListener("click", async (target) =>{
    choice = confirm("Tem certeza que deseja apagar o Post?")
    if(choice){
      const urlDinamic = btn.dataset.url
      const method = btn.dataset.method
      const id = btn.dataset.id
      const data = {"id": id}
      POST(urlDinamic,method,data,btn)
    }
  })
});