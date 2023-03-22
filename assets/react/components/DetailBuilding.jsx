import React from 'react';
import{ useState, useEffect } from 'react';

import { BrowserRouter as Router,Routes, Route, Link } from 'react-router-dom';

import { createRoot } from "react-dom/client";
const container = document.getElementById('app');

const root = createRoot(container);

import { useLocation } from 'react-router-dom'


root.render(
    <React.StrictMode>
        <DetailBuilding/>
    </React.StrictMode>

)


const DetailBuilding = () => {


    var url = "/detail-building/";
    const location = useLocation()
    const { from } = location.state
    
    const [posts, setPosts] = useState([])
    const [loading, setLoading] = useState(true)
  
    useEffect(() => {
        fetchDatas()
    }, [])
  
    const fetchDatas = async () => {
        const url = `/api/building/${from}`;
        try {
            const response = await fetch(url, {
                headers: {
                    'Accept': 'application/json',
                },
            }).then(r => r.json())
  
            setPosts(JSON.parse(response.datas))
            setLoading(false)
        } catch (error) {
            console.log(error)
        }
  
    }
  
  
    console.log(posts);
    const repLogElements = posts.map((repLog, index) => {
        
        return (
          
            <tr data-index={index}>  
                <td>{repLog.id}</td>  
                <td>{repLog.nom}</td>  
                <td>{repLog.zipcode}</td>
                
            </tr>  
            
        )
    });
  
    
    console.log(typeof(posts));
  //onClick="detailsBuilding({repLog.id})"
    return (
        <div className="container">   
                    
            <table className="table table-bordered table table-striped" id="example">  
                <thead>
                    <tr>  
                        <th>ID</th>  
                        <th>Nom</th>  
                        <th>zipcode</th>
                    </tr> 
                </thead>
                 
                <tbody>     
                    {repLogElements}
                </tbody>
                
        
            </table>  
        
        </div>  
    );
  }



export default DetailBuilding;