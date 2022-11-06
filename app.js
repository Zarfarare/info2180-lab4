window.onload = function(){
    let searchBtn = document.querySelector("#btn")

    searchBtn.addEventListener("click", (event)=>{
        event.preventDefault();
        fetch("http://localhost/info2180-lab4/superheroes.php")
        .then(response => {
            return response.text();
        })
        .then(data => {
            alert(data)
        })
    })
}
