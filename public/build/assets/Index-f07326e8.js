import{j as N,V as c,o as y,e as F,b as I,u as E,Z as K,r as P,F as Z,d as n,c as D,w as $,a as t,t as w,f as z}from"./app-470e78aa.js";import{C as O,a as R,L as q,B as G,p as J,b as Q,c as U}from"./chart-c38e3f54.js";import{B as W}from"./index-ebe00d26.js";const X={__name:"BlankLayout",props:{title:String},setup(d){return N(()=>{var a,s,l,i,o,m,b,r,u,h,v,_;((s=(a=c().props)==null?void 0:a.flash)==null?void 0:s.success)!==null&&((i=(l=c().props)==null?void 0:l.flash)==null?void 0:i.success)!==void 0&&ToastAlert.fire({position:"top-end",icon:"success",toast:!0,title:(m=(o=c().props)==null?void 0:o.flash)==null?void 0:m.success}),((r=(b=c().props)==null?void 0:b.flash)==null?void 0:r.warnings)!==null&&((h=(u=c().props)==null?void 0:u.flash)==null?void 0:h.warnings)!==void 0&&ToastAlert.fire({position:"top-end",icon:"error",toast:!0,title:(_=(v=c().props)==null?void 0:v.flash)==null?void 0:_.warnings})}),(a,s)=>(y(),F(Z,null,[I(E(K),{title:d.title},null,8,["title"]),P(a.$slots,"default")],64))}},Y={class:"max-w-full mx-auto sm:px-6 lg:px-8 bg-gray-50 pt-7"},tt={class:"w-full"},at={class:"uppercase text-4xl text-center mx-auto"},et={class:"grid grid-cols-12 gap-6 mt-5"},st={class:"col-span-12 sm:col-span-6 xl:col-span-4 intro-y"},lt={class:"flex rounded-lg h-full bg-white p-8 flex-col"},it={class:"box p-5"},ot=t("div",{class:"flex"},[t("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"lucide lucide-users"},[t("path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}),t("circle",{cx:"9",cy:"7",r:"4"}),t("path",{d:"M22 21v-2a4 4 0 0 0-3-3.87"}),t("path",{d:"M16 3.13a4 4 0 0 1 0 7.75"})])],-1),ct={class:"text-3xl font-medium leading-8 mt-6"},nt=t("div",{class:"text-base text-slate-500 mt-1"},"Kandidat",-1),dt={class:"col-span-12 sm:col-span-6 xl:col-span-4 intro-y"},rt={class:"flex rounded-lg h-full bg-white p-8 flex-col"},ut={class:"box p-5"},ht=t("div",{class:"flex"},[t("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"lucide lucide-vote"},[t("path",{d:"m9 12 2 2 4-4"}),t("path",{d:"M5 7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v12H5V7Z"}),t("path",{d:"M22 19H2"})])],-1),vt={class:"text-3xl font-medium leading-8 mt-6"},_t=t("div",{class:"text-base text-slate-500 mt-1"},"DPT (Daftar Pemilih Tetap)",-1),xt={class:"col-span-12 sm:col-span-6 xl:col-span-4 intro-y"},ft={class:"flex rounded-lg h-full bg-white p-8 flex-col"},gt={class:"box p-5"},mt=t("div",{class:"flex"},[t("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"report-box__icon text-warning"},[t("path",{d:"M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"})])],-1),wt={class:"text-3xl font-medium leading-8 mt-6"},bt=t("div",{class:"text-base text-slate-500 mt-1"},"Suara Masuk",-1),pt={class:"mt-7"},Ct={__name:"Index",props:{attributes:{type:Object,default:{}}},setup(d){var u,h,v,_,B,C,M;const a=d;O.register(R,q,G,J,Q,U);const s=n(),l=n(),i=n(),o=n();l.value=(h=(u=a==null?void 0:a.attributes)==null?void 0:u.datalabel)==null?void 0:h.candidates,i.value=(_=(v=a==null?void 0:a.attributes)==null?void 0:v.datalabel)==null?void 0:_.voters,o.value=(C=(B=a==null?void 0:a.attributes)==null?void 0:B.datalabel)==null?void 0:C.voters_inactive;const m=n(!0);s.value=(M=a==null?void 0:a.attributes)==null?void 0:M.charts,setInterval(async()=>{var p,k,x,f,g;m.value&&await axios.get((p=a==null?void 0:a.attributes)==null?void 0:p.route_chart).then(e=>{var S,T,j,V,A,H,L;s.value={},e!=null&&e.data&&(s.value=(S=e==null?void 0:e.data)==null?void 0:S.charts,l.value=(j=(T=e==null?void 0:e.data)==null?void 0:T.datalabel)==null?void 0:j.candidates,i.value=(A=(V=e==null?void 0:e.data)==null?void 0:V.datalabel)==null?void 0:A.voters,o.value=(L=(H=e==null?void 0:e.data)==null?void 0:H.datalabel)==null?void 0:L.voters_inactive)}),((x=(k=a==null?void 0:a.attributes)==null?void 0:k.datalabel)==null?void 0:x.voters)==((g=(f=a==null?void 0:a.attributes)==null?void 0:f.datalabel)==null?void 0:g.voters_inactive)},1e3*60);const r=n();return r.value={responsive:!0,maintainAspectRatio:!1,legend:{display:!1}},N(()=>{}),(p,k)=>{var x,f;return y(),D(X,{title:(f=(x=d.attributes)==null?void 0:x.vote)==null?void 0:f.name},{default:$(()=>{var g,e;return[t("div",Y,[t("div",tt,[t("h1",at,"Hasil "+w((e=(g=d.attributes)==null?void 0:g.vote)==null?void 0:e.name),1)]),t("div",et,[t("div",st,[t("div",lt,[t("div",it,[ot,t("div",ct,w(l.value),1),nt])])]),t("div",dt,[t("div",rt,[t("div",ut,[ht,t("div",vt,w(i.value),1),_t])])]),t("div",xt,[t("div",ft,[t("div",gt,[mt,t("div",wt,w(o.value),1),bt])])])]),t("div",pt,[s.value?(y(),D(E(W),{key:0,data:s.value,options:r.value,style:{position:"relative",height:"500px !important"}},null,8,["data","options"])):z("",!0)])])]}),_:1},8,["title"])}}};export{Ct as default};