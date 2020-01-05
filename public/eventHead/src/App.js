class App extends React.Component {
    state = {
        data: {},
        loading: true 
    }
    componentDidMount = () => {
        axios.get('/dashboard/getData')
        .then(res => {
            let zero = "0";
            this.setState({data: res.data,loading: false,title: res.data[zero].title})
        }).catch(err => console.log(err));
    }
    handleSubmit = () => {
        let data = this.state.data;
        let value = {
            title: this.state.title,
            removedList: []
        }
        Object.keys(data).forEach(val => {
            if(data[val].active == 0){
                value.removedList.push(data[val].participant_id)
            }
        })
        axios.post('/dashboard/updateData',value)
            .then(res => {
                window.location.reload();
            }).catch(err => console.log(err));
    }
    render() {
        let zero = "0";
        let data = this.state.data;  
        return (
            <div>
                {this.state.loading
                    ?
                    <div>
                        loading
                    </div>
                    :
                    <div>
                        <div className="col-md-12 d-flex" style={{justifyContent: 'space-around'}}> 
                            <h4 className="text-center text-uppercase">{data[zero].event_id}</h4>
                        </div>
                        <hr />
                        <div className="card container p-2">
                            <div className="form-group">
                                <label>Enter the Event Title</label>
                                <input type="text" placeholder="Event Title" className="form-control"
                                    value={this.state.title} onChange={(e) => {
                                        this.setState({title: e.target.value})
                                    }}
                                />
                            </div>

                            <div className="row">
                                {
                                    Object.keys(data).map((value, i) => {
                                        if(data[value].active == 1) {
                                            return (
                                                <div key={i} className="col-sm-12 col-md-4 col-lg-3 event-list ">
                                                    <div className="p-1 event-list-content shadow d-flex border-green" key={i} style={{ flexDirection: "row", alignItems: "center"}}>
                                                        <span className="ft-user text-success"></span>
                                                        <h5 className="p-0 m-0 px-1" style={{flex: 1}}>{data[value].college_code}</h5>
                                                        <span className="ft-x text-danger" onClick={() =>{
                                                            let data = this.state.data; 
                                                            data[value].active = 0;
                                                            this.setState({data})
                                                        }}></span>
                                                    </div>
                                                </div>
                                            )
                                        } else {
                                            return (
                                                <div key={i} className="col-sm-12 col-md-4 col-lg-3 event-list ">
                                                    <div className="p-1 event-list-content shadow d-flex border-redy" key={i} style={{ flexDirection: "row", alignItems: "center"}}>
                                                        <span className="ft-user text-danger    "></span>
                                                        <h5 className="p-0 m-0 px-1" style={{flex: 1}}>{data[value].college_code}</h5>
                                                        <span className="ft-plus text-success" onClick={() => {
                                                            let data = this.state.data; 
                                                            data[value].active = 1;
                                                            this.setState({data})
                                                        }}></span>
                                                    </div>
                                                </div>
                                            )
                                        }
                                    })
                                } 
                            </div>

                            <button type="button" style={{maxWidth: '100px;'}} className="mt-2 btn btn-primary" data-toggle="modal" data-target="#xlarge">
                                <i className="ft-upload"></i> Update Event Details
                            </button>
                        </div>
                        <div className="modal fade text-left" id="xlarge" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel16" style={{display: "none"}} aria-hidden="true">
                            <div className="modal-dialog modal-xl" role="document">
                                <div className="modal-content">
                                    <div className="modal-header">
                                        <h4 className="modal-title" id="myModalLabel16">Event Updates</h4>
                                        <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div className="modal-body">
                                        <div className="bs-callout-red callout-border-left my-2 p-1 bg-warn">
                                            <strong>Warning!!</strong>
                                            <p>Before Updating go through the Team Names and make sure everything is proper .Once the event has been update it cannot be Changed</p>
                                        </div>
                                        <h4><b>Title:</b>{this.state.title}</h4>
                                        <div className="row">
                                            {
                                                Object.keys(data).map((value, i) => {
                                                    if(data[value].active == 1) {
                                                        return (
                                                            <div key={i} className="col-sm-12 col-md-4 col-lg-3 event-list ">
                                                                <div className="p-1 event-list-content shadow d-flex border-green" key={i} style={{ flexDirection: "row", alignItems: "center"}}>
                                                                    <span className="ft-user text-success"></span>
                                                                    <h5 className="p-0 m-0 px-1" style={{flex: 1}}>{data[value].college_code}</h5>
                                                                </div>
                                                            </div>
                                                        )
                                                    } else {
                                                        <div style={{display: 'none'}}></div>
                                                    }
                                                })
                                            }
                                        </div>
                                    </div>
                                    <div className="modal-footer">
                                        <button type="button" className="btn grey btn-outline-secondary" data-dismiss="modal">Make Changes</button>
                                        <button type="button" className="btn btn-outline-primary"
                                            onClick={this.handleSubmit}
                                        >Update changes</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                    }
            </div>
        )
    }
}
const domContainer = document.querySelector('#root');
ReactDOM.render(React.createElement(App), domContainer);


     