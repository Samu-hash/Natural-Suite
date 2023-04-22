const storage = {}

const userName = 'username'
const password = 'password'

storage.saveData = (bool, name, pwd) => {
    if (bool) {
        localStorage.setItem(userName, name)
        localStorage.setItem(password, pwd)
    }
}

storage.getItems = () => {
    if (localStorage.getItem(userName) !== null && localStorage.getItem(password)){
        $('#correoLogin').val(localStorage.getItem(userName)),
        $('#claveLogin').val(localStorage.getItem(password))
    }
}

export default storage