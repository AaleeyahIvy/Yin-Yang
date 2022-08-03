import { getDatabase, ref, set } from "firebase/database";

function writeUserData(userId, fullname, email) {
  const db = getDatabase();
  set(ref(db, 'users/' + userId), {
    username: fullname,
    email: email
  });
}

document.getElementById('submit').addEventListener('click', writeUserData);