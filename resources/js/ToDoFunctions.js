function deleteTask(task_id) {
    let url = "/delete/" + task_id;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
    })
    .then(responce => {
        if(responce.status == 200){
            window.location.reload();
        }
    })
}

function completeTask(task_id) {
    let url = "/complete/" + task_id;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
    })
    .then(responce => {
        if(responce.status == 200){
            window.location.reload();
        }
    })
}

window.deleteTask = deleteTask;
window.completeTask = completeTask;