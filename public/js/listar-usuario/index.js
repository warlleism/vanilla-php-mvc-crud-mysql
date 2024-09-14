

var modal = document.getElementById("editModal");
var span = document.getElementsByClassName("close")[0];
var editButtons = document.querySelectorAll('#icon-edit');

function openModal() {
    modal.style.display = "block";
}

span.onclick = () => {
    modal.style.display = "none";
}

window.onclick = (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}


function populateModal(row) {
    const id = row.querySelector("td:nth-child(1)").innerText;
    const nome = row.querySelector("td:nth-child(2)").innerText;
    const email = row.querySelector("td:nth-child(3)").innerText;
    const dataNascimento = row.querySelector("td:nth-child(4)").innerText;
    const idade = row.querySelector("td:nth-child(5)").innerText;

    document.getElementById("id").value = id;
    document.getElementById("nome").value = nome;
    document.getElementById("email").value = email;
    document.getElementById("data_nascimento").value = dataNascimento;
    document.getElementById("idade").value = idade;
}

editButtons.forEach((button, index) => {
    button.onclick = () => {
        const row = button.closest('tr');
        populateModal(row);
        openModal();
    }
});
