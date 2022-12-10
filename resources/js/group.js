import {} from "axios";
import { parseInt } from "lodash";
const getStudent = "/api/students/";
const postGroup = "/api/group/";

let btnAgregarAlumno = document.querySelector("button");
btnAgregarAlumno.onclick = agregarAlumno;

let btnGuardarGrupo = document.querySelector("form");
btnGuardarGrupo.onsubmit = validar;

const grupo = {
    number: null,
    career_id: null,
    alumnos: [],
};

const students = document.getElementById("tablaAlumnos");

async function agregarAlumno() {
    const inputMatricula = document.getElementById("matricula").value;
    let matricula = inputMatricula.toString();

    await fetch(getStudent + matricula)
        .then((response) => response.json())
        .then((data) => {
            if (grupo.alumnos.includes(data.id)) {
                alert("El alumno ya ha sido agregado");
            } else {
                grupo.alumnos.push(data.id);
                alert("Alumno: " + data.name + " agregado");

                students.innerHTML +=
                    '<tr id="' +
                    data.id +
                    '_row">' +
                    '<td class="budget">' +
                    data.id +
                    "</td>" +
                    '<td><span class="name mb-0 text-sm">' +
                    data.name +
                    "</span></td>" +
                    '<td><button type="button" class="btn btn-outline-danger btn-sm"><i id="' +
                    data.id +
                    '_btn" class="fas fa-trash"></i></button></td></tr>';
                let btnId = data.id + "_btn";
                const btn = document.getElementById(btnId);
                btn.onclick = removeItem;
            }

            document.getElementById("matricula").value = null;
        })
        .catch(() => alert("Alumno no existe"));
}

function removeItem(event) {
    let id = event.target.id.split("_")[0];
    const row = document.getElementById(id + "_row");

    // row.remove()
}

async function guardarGrupo() {
    let select = document.getElementById("careerId");
    let careerId = select.options[select.selectedIndex].value;
    let groupNumber = document.getElementById("groupNumber").value;

    grupo.number = groupNumber;
    grupo.career_id = careerId;
    try {
        await fetch(postGroup, {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(grupo),
        });

        alert("Grupo agregado");
    } catch (error) {
        alert("No se ha podido guardar el grupo");
    }
}

function validar() {
    let select = document.getElementById("careerId");
    let careerId = select.options[select.selectedIndex].value;
    let groupNumber = document.getElementById("groupNumber").value;

    let state = true;

    careerId !== "Seleccionar..."
        ? (grupo.career_id = parseInt(careerId))
        : (state = false);
    groupNumber !== ""
        ? (grupo.number = parseInt(groupNumber))
        : (state = false);
    grupo.alumnos.length !== 0 ? (state = true) : (state = false);

    state === true
        ? guardarGrupo()
        : alert("Por favor complete todos los campos");
}
