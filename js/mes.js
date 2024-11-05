const form = document.getElementById('form-gastos');
const tabela = document.getElementById('tabela-gastos');
const tbody = document.getElementById('tbody-gastos');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const nome = document.getElementById('nome').value;
    const data = document.getElementById('data').value;
    const pagamento = document.getElementById('pagamento').value;
    const categoria = document.getElementById('categoria').value;
    const valor = document.getElementById('valor').value;

    const linha = document.createElement('tr');
    linha.innerHTML = `
        <td>${nome}</td>
        <td>${data}</td>
        <td>${pagamento}</td>
        <td>${categoria}</td>
        <td>${valor}</td>
    `;
    tbody.appendChild(linha);

    form.reset();
});