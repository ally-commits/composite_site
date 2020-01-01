const Input = ({event_name, event_control,onEventControl, participant_number
                ,onInputChange, inputValue, error
    }) => {
    const sendFalse = () => {
        onEventControl(false, event_name)
    }
    const sendTrue = () => {
        onEventControl(true, event_name)
    }
    const onChange = (e) => {
        onInputChange(e.target.name, e.target.value, event_name)
    }
    return (
        <div className="row mt-1">
            <div className="col-md-8 m-auto">   
                <div className="form-group row">
                    <label className="col-md-2 label-control text-uppercase">{event_name}</label>
                    <div className="col-md-8">
                        
                        {participant_number.map((val) => {
                            return (
                                <input type="text" 
                                    className={"form-control mb-1 " + (error && "is-invalid")} disabled={!event_control}
                                    placeholder="Participant Name" name={val} 
                                    onChange={onChange} value={inputValue[val]}
                                    
                                />
                            )
                        })}
                        {error && <span className="text-danger"><i className="ft-alert-octagon"></i>  {error}</span>}
                    </div>
                    <div className="" >
                        <a className={"btn border-lite " + (!event_control ? "btn-danger text-white" : "btn-default")}
                            onClick={sendFalse}
                        >No</a>
                        <a className={"btn border-lite " + (event_control ? "btn-success text-white" : "btn-default")}
                            onClick={sendTrue}
                        >Yes</a>
                    </div>
                </div>
                <hr/>
            </div> 
        </div>  
    )
}

class App extends React.Component { 
    state = {
        step: 2,
        events: {
            it_manager: {
                participating: false,
                names: {
                    name1: ''
                },
                error: false
            },
            vlog: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            paper_presentation: {
                participating: false,
                names: {
                    name1: ''
                },
                error: false
            },
            web_design: {
                participating: false,
                names: {
                    name1: ''
                },
                error: false
            },
            coding: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            it_quiz: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            treasure_hunt: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            gaming: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            video_editing: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            photography: {
                participating: false,
                names: {
                    name1: '' 
                },
                error: false
            },
            cosplay: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            mad_ad: {
                participating: false,
                names: {
                    name1: '',
                    name2: '',
                    name3: '',
                    name4: '',
                    name5: ''
                },
                error: false
            }
        },
        college: {
            name: '',
            error: ''
        },
        uniqueList: [],
        count: 0
    }
    handleStepUpdate = () => {
        this.setState({step: this.state.step + 1})
    } 
    onEventControl = (control , event_name) => {
        let events = this.state.events;
        events[event_name].participating = control;
        this.setState({events});
    } 
    onInputHandle = (name, value, event_name) => {
        let events = this.state.events;
        events[event_name].names[name] = value;
        this.setState({events});
    }
    handleFieldEmpty = (step_events) => {
        let events = this.state.events;
        let validated = true; 
        step_events.forEach(event => {
            if(events[event].participating) { 
                Object.keys(events[event].names).forEach(name => {
                    if(events[event].names[name] == '') {
                        events[event].error = `${event} name field cannot be empty. if your not participating then click NO button`
                        validated = false;
                    } else {
                        events[event].error = false;
                    }
                })
            } else {
                events[event].error = false;
            }
        }) 
        this.setState({events}); 
    }
    handleUniqueNames = (step_events) => {
        let events = this.state.events;
        let uniqueList = [];
        step_events.forEach(event => {
            if(events[event].participating) {
                Object.keys(events[event].names).map(name => {
                    if(events[event].names[name] != '') {
                        uniqueList.forEach(val => { 
                            if(val.name == events[event].names[name]) {
                                if(val.event == event) {
                                    events[event].error = `${val.event} should have two diffrent names. if both the participant's names are same then diffrentiate then with surnames`
                                } else {
                                    events[event].error = `${events[event].names[name]} is already participating in ${val.event}. he cannot participate in ${event}`;
                                }
                            }
                        })
                        uniqueList.push({
                            name: events[event].names[name],
                            event
                        }) 
                    }
                })
            }
        })
        this.setState({events}) 
    }
    handleValidation1 = () => {
        let college = this.state.college;
        if(college.name == '') 
            college.error = 'College Name Field cannot be empty'
        else
            this.setState({step: 2})
        this.setState({college});
    }
    handleValidation2 = () => {
        let step_events = ['it_manager','paper_presentation','treasure_hunt','web_design'];
        this.handleFieldEmpty(step_events);
        this.handleUniqueNames(step_events); 
    }
    handleValidation3 = () => {
        let step_events = ['gaming','coding','photography','video_editing'];
        this.handleFieldEmpty(step_events);
    }
    handleValidation4 = () => {
        let step_events = ['it_quiz','cosplay','vlog','mad_ad'];
        this.handleFieldEmpty(step_events);
    }
    render() {
        let events = this.state.events;
        let step = this.state.step; 
        return (
            <div className="">
                <div className="card">
                    <div className="card-header">
                        <h2 className="card-title text-center">College Registration for Composite 2020</h2> 
                    </div>

                    <div className="container flex-h py-2">

                        <div className="flex1 step-parent " >
                            <span className="step active">1</span>
                            <span className="mt-1">Step 1</span>
                        </div>

                        <div className={"flex3 line " + (this.state.step > 1 && "line-active")}></div>
                        <div className={"flex1 step-parent"} >
                            <span className={"step " + (this.state.step > 1 ? "active" : "new")}>2</span>
                            <span className="mt-1">Step 2</span>
                        </div>

                        <div className={"flex3 line " + (this.state.step > 2 && "line-active")}></div>
                        <div className="flex1 step-parent" >
                            <span className={"step  "+ (this.state.step > 2 ? "active" : "new")}>3</span>
                            <span className="mt-1">Step 3</span>
                        </div>
                        
                        <div className={"flex3 line " + (this.state.step > 3 && "line-active")}></div>
                        <div className="flex1 step-parent" >
                            <span className={"step  "+ (this.state.step > 3 ? "active" : "new")}>4</span>
                            <span className="mt-1">Step 4</span>
                        </div> 
                    </div>
                    <hr/>
                    {this.state.step == 1 && <div className="col-md-8 m-auto pt-2">
                        <div className="form-group row">
                            <label className="col-md-3 label-control">Enter Your College Name</label>
                            <div className="col-md-7">
                                <input type="text" 
                                    className="form-control" 
                                    placeholder="Enter Your College Name" 
                                    onChange={(e) => {
                                        let college = this.state.college;
                                        college.name = e.target.value;
                                        this.setState({college: college})
                                    }} 
                                    value={this.state.college.name} 
                                />
                                {this.state.college.error && <span className="text-danger"><i className="ft-alert-octagon"></i>  {this.state.college.error}</span>}
                            </div>                                           
                        </div>
                        <hr />

                        <div className="flex-h flex-end p-1">
                            <button className="btn btn-primary btn-no-radius"  onClick={this.handleValidation1}>Submit</button>
                        </div>
                    </div>}

                    {this.state.step == 2 && 
                    <div className="container-fluid"> 
                        <Input event_name={"it_manager"} event_control={events.it_manager.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1']} 
                            onInputChange={this.onInputHandle} inputValue={events.it_manager.names}
                            error={events.it_manager.error} 
                        />

                        <Input event_name={"paper_presentation"} event_control={events.paper_presentation.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1']} 
                            onInputChange={this.onInputHandle} inputValue={events.paper_presentation.names} 
                            error={events.paper_presentation.error} 
                        />
 
                        <Input event_name={"treasure_hunt"} event_control={events.treasure_hunt.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1','name2']} 
                            onInputChange={this.onInputHandle} inputValue={events.treasure_hunt.names} 
                            error={events.treasure_hunt.error} 
                        />

                        <Input event_name={"web_design"} event_control={events.web_design.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1']} 
                            onInputChange={this.onInputHandle} inputValue={events.web_design.names} 
                            error={events.web_design.error} 
                        />
                        <hr />

                        <div className="flex-h flex-end p-1">
                            <button className="btn btn-primary btn-no-radius" onClick={this.handleValidation2}>Submit</button>
                        </div>
                    </div>}

                    {step ==3 && 
                    <div className="container-fluid">
                        <Input event_name={"coding"} event_control={events.coding.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1','name2']} 
                            onInputChange={this.onInputHandle} inputValue={events.coding.names}
                            error={events.coding.error}  
                        />

                        <Input event_name={"gaming"} event_control={events.gaming.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1','name2']} 
                            onInputChange={this.onInputHandle} inputValue={events.gaming.names} 
                            error={events.gaming.error} 
                        />

                        <Input event_name={"photography"} event_control={events.photography.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1']} 
                            onInputChange={this.onInputHandle} inputValue={events.photography.names} 
                            error={events.photography.error} 
                        />

                        <Input event_name={"video_editing"} event_control={events.video_editing.participating} 
                            onEventControl={this.onEventControl} participant_number={['name1','name2']} 
                            onInputChange={this.onInputHandle} inputValue={events.video_editing.names} 
                            error={events.video_editing.error} 
                        /> 
                            
                        <hr />

                        <div className="flex-h flex-end p-1">
                            <button className="btn btn-primary btn-no-radius"  onClick={this.handleValidation3}>Submit</button>
                        </div>
                    </div>
                    }

                    {step == 4 && 
                        <div className="container-fluid">
                            <Input event_name={"it_quiz"} event_control={events.it_quiz.participating} 
                                onEventControl={this.onEventControl} participant_number={['name1','name2']} 
                                onInputChange={this.onInputHandle} inputValue={events.it_quiz.names} 
                                error={events.it_quiz.error} 
                            />

                            <Input event_name={"cosplay"} event_control={events.cosplay.participating} 
                                onEventControl={this.onEventControl} participant_number={['name1','name2']} 
                                onInputChange={this.onInputHandle} inputValue={events.cosplay.names}   
                                error={events.cosplay.error}  
                            />

                            <Input event_name={"vlog"} event_control={events.vlog.participating} 
                                onEventControl={this.onEventControl} participant_number={['name1','name2']} 
                                onInputChange={this.onInputHandle} inputValue={events.vlog.names}   
                                error={events.vlog.error}    
                            />

                            <Input event_name={"mad_ad"} event_control={events.mad_ad.participating} 
                                onEventControl={this.onEventControl} participant_number={['name1','name2','name3','name4','name5']} 
                                onInputChange={this.onInputHandle} inputValue={events.mad_ad.names}
                                error={events.mad_ad.error}    
                            />
                            <hr />

                            <div className="flex-h flex-end p-1">
                                <button className="btn btn-primary btn-no-radius"  onClick={this.handleValidation4}>Submit</button>
                            </div>
                        </div>
                    } 
                </div>
            </div>
        )
    }
}
const domContainer = document.querySelector('#root');
ReactDOM.render(React.createElement(App), domContainer);


     