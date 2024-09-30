import React, {useState, useEffect} from "react";
import formIllustration from '../../images/terms-1.png';

export function PresetForm(){


    const [formData, setFormData] = useState({});
    const [title, setTitle] = useState("");
    const [cal, setCal] = useState("");
    const [protein, setProtein] = useState("");
    const [sugar, setSugar] = useState("");
    const [type, setType] = useState("");

    const [foodTypes, setFoodTypes] = useState([]);

    // ... existing functions for form handling (titleChanged, calChanged, etc.)

    useEffect(() => {
        const fetchFoodTypes = async () => {
            try {
                const response = await fetch("https://restapi.seemann-kahne.de/api/foodtype/all", {
                    method: "GET",
                });

                if (!response.ok) {
                    throw new Error("Fehler beim Abrufen der Foodpresets");
                }

                const data = await response.json();
                setFoodTypes(data);
            } catch (error) {
                console.error("Fehler beim Abrufen:", error);
            }
        };

        fetchFoodTypes();
    }, []);



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






    const formSubmitted = async (event) => {

        event.preventDefault();
        setFormData({title, protein, sugar, type, cal});

        const data = {
            title: title,
            protein: protein,
            sugar: sugar,
            type: type,
            cal: cal
        };

        try {
            const response = await fetch('https://restapi.seemann-kahne.de/api/foodpresets', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            if (!response.ok) {
                throw new Error('Fehler beim Senden');
            }

            const result = await response.json();
            console.log('Antwort:', result);
        } catch (error) {
            console.error('Fehler:', error);
        }
    };
    


    return (

        <form onSubmit={formSubmitted}>

            <div className="form-group my-3">
                <div htmlFor="type" className="form-label small">Kategorie</div>
                <select id="type" className="form-select" name="type" value={type} onInput={typeChanged}>
                    {foodTypes.map(foodType => (
                        <option key={foodType.uid} value={foodType.uid}>
                            {foodType.title}
                        </option>
                    ))}
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