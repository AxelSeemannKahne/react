import React, {useState} from "react";
import formIllustration from '../../images/terms-1.png';

export function PresetForm(){

    const [formData, setFormData] = useState({});
    const [title, setTitle] = useState("");
    const [cal, setCal] = useState("");
    const [protein, setProtein] = useState("");
    const [sugar, setSugar] = useState("");
    const [type, setType] = useState("");

    const titleChanged = (event) => {
        setTitle(event.target.value);
    }

    const calChanged = (event) => {
        setCal(event.target.value);
    }

    const proteinChanged = (event) => {
        setProtein(event.target.value);
    }

    const sugarChanged = (event) => {
        setSugar(event.target.value);
    }

    const typeChanged = (event) => {
        setType(event.target.value);
    }

    const formSubmitted = (submitEvent) => {
        submitEvent.preventDefault();
        setFormData({title, protein, sugar, type, cal});

        const formData = new FormData();
        formData.append('tx_askcaloriecounter_caloriecounterapi[newFoodPreset][title]', title);
        formData.append('tx_askcaloriecounter_caloriecounterapi[newFoodPreset][cal]', cal);
        formData.append('tx_askcaloriecounter_caloriecounterapi[newFoodPreset][sugar]', sugar);
        formData.append('tx_askcaloriecounter_caloriecounterapi[newFoodPreset][protein]', protein);
        formData.append('tx_askcaloriecounter_caloriecounterapi[newFoodPreset][type]', type);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://react.seemann-kahne.de/typo3_11/public/index.php?id=2&type=777&tx_askcaloriecounter_caloriecounterapi[action]=insert', true); // Replace with the actual API endpoint

        // Set authentication headers if required
        // xhr.setRequestHeader('Authorization', 'Bearer your_token');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Data created successfully:', xhr.responseText);
                } else {
                    console.error('Error creating data:', xhr.status, xhr.responseText);
                }
            }
        };

        xhr.send(formData);

    }


    return (

        <form onSubmit={formSubmitted}>

            <div className="form-group my-3">
                <div htmlFor="type" className="form-label small">Kategorie</div>
                <select id="type" className="form-select" name="type" value={type} onInput={typeChanged}>
                    <option value="1">Hauptmahlzeit</option>
                    <option value="2">Getränke</option>
                    <option value="3">Sportnahrung</option>
                    <option value="4">Süssigkeiten</option>
                    <option value="5">Gebäck</option>
                </select>
            </div>

            <div className="form-group mb-3">
                <div htmlFor="title" className="form-label small">Bezeichnung</div>
                <input id="title" className="form-control" name="title" value={title} onInput={titleChanged}/>
            </div>
            <div className="form-group mb-3">
                <div htmlFor="cal" className="form-label small">Kalorien</div>
                <input id="cal" className="form-control" name="cal" value={cal} onInput={calChanged}/>
            </div>
            <div className="form-group mb-3">
                <div htmlFor="protein" className="form-label small">Protein</div>
                <input id="protein" className="form-control" name="protein" value={protein}
                       onInput={proteinChanged}/>
            </div>
            <div className="form-group mb-3 small">
                <div htmlFor="sugar" className="form-label">Zucker</div>
                <input id="sugar" className="form-control" name="sugar" value={sugar} onInput={sugarChanged}/>
            </div>

            <input className="btn btn-primary mt-6 float-end" type="submit" value="Absenden"/>

            <div
                className="flex-grow-1 bgi-no-repeat bgi-size-contain  bgi-position-y-bottom card-rounded-bottom h-150px"
                style={{
                    backgroundImage: `url(${formIllustration})`,
                }}>
            </div>
        </form>


    );

}