const dashboard = document.getElementById('admin-live-dashboard');
if (dashboard) {
    const metrics = document.getElementById('admin-metrics');
    const issues = document.getElementById('issue-log');

    const renderMetrics = () => {
        if (!metrics) return;
        const value = Math.round(Math.random() * 100);
        metrics.textContent = `Live attendance health: ${value}%`;
    };

    const refreshIssues = () => {
        if (!issues) return;
        const li = document.createElement('li');
        li.textContent = 'Auto-check at ' + new Date().toLocaleTimeString();
        issues.appendChild(li);
    };

    setInterval(renderMetrics, 5000);
    setInterval(refreshIssues, 10000);
    renderMetrics();
}
