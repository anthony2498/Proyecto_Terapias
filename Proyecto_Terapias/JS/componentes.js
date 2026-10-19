function createNavbar(activePage) {

    const menuItems = [
        { text: 'Inicio', href: '../index.php', page: 'home' },
        { text: 'Usuarios', href: 'usuarios.html', page: 'usuarios' },
        { text: 'Citas', href: 'citas.html', page: 'citas' },
        { text: 'Terapias', href: '../terapias.php', page: 'terapias' }
    ];

    const navHTML = `
        <aside class="col-md-3 bg-primary text-white p-3">
            <h4 class="text-center mb-4">
                <i class="bi bi-heart-pulse"></i> Terapias Alternativas
            </h4>

            <ul class="nav flex-column">

                ${menuItems.map(item => `
                    <li class="nav-item">

                        <a class="nav-link text-white ${activePage === item.page ? 'active' : ''}" 
                        href="${item.href}">

                        ${item.text}

                        </a>

                    </li>
                `).join('')}

            </ul>
        </aside>
    `;

    return navHTML;
}

function initLayout(pageName){

    const mainRow = document.getElementById('main-row');

    if(mainRow){
        mainRow.insertAdjacentHTML('afterbegin', createNavbar(pageName));
    }

}