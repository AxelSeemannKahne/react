import React from 'react';
import cardIllustration from '../../images/terms-2.png';


export function StartContent() {

    return (

        <div className="card h-100">
            <div className="card-body pb-0 w-100 h-100">
                <div className="d-flex flex-column h-100">
                    <h3 className="text-dark text-center fs-1 fw-bolder pt-15 lh-lg">Track<br/>your Calories
                    </h3>
                    <div className="text-center pt-7"><a className="btn btn-primary fw-bolder fs-6 px-7 py-3">Register</a></div>


                    <div className="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom card-rounded-bottom h-200px" style={{
                        backgroundImage: `url(${cardIllustration})`,
                        // Weitere Style-Eigenschaften
                    }}>
                        {/* Inhalt der Komponente */}
                    </div>
                </div>
            </div>
        </div>
    );
}