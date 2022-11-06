window.onload = function(){

    document.querySelector("#btn").addEventListener("click", (event)=>{
        let input = document.querySelector("Input");
        let query = input.value ? input.value : "";
        fetch(`http://localhost/info2180-lab4/superheroes.php?query=${query.trim()}`)
        .then(response => {
            return response.text();
        })
        .then(data =>{
            document.querySelector("#result").innerHTML=data;
        })
        .catch(err =>{
            console.log(err);
        })
    })
}