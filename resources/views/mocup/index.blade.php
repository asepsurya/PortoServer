<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DXF Viewer & Editor - Professional CAD Tool</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #06b6d4;
            --dark-bg: #1e293b;
            --darker-bg: #0f172a;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--light-bg);
            color: var(--text-primary);
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        /* Main Layout */
        .main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* Left Sidebar - File & Layers */
        .left-sidebar {
            width: 280px;
            background: white;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }

        .sidebar-section {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .section-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* File Upload Area */
        .upload-area {
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            padding: 24px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--light-bg);
        }

        .upload-area:hover {
            border-color: var(--primary-color);
            background: #f0f9ff;
        }

        .upload-area.dragover {
            border-color: var(--primary-color);
            background: #dbeafe;
        }

        .upload-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .upload-text {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        /* File Info */
        .file-info {
            display: none;
            padding: 12px;
            background: var(--light-bg);
            border-radius: 6px;
            margin-top: 12px;
        }

        .file-info.active {
            display: block;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.875rem;
            margin-bottom: 4px;
        }

        .info-label {
            color: var(--text-secondary);
        }

        .info-value {
            font-weight: 500;
        }

        /* Layers Panel */
        .layers-container {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
        }

        .layer-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            margin-bottom: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .layer-item:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
        }

        .layer-item.active {
            background: #dbeafe;
            border-color: var(--primary-color);
        }

        .layer-visibility {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            cursor: pointer;
            color: var(--text-secondary);
        }

        .layer-visibility.visible {
            color: var(--success-color);
        }

        .layer-color {
            width: 16px;
            height: 16px;
            border-radius: 3px;
            margin-right: 10px;
            border: 1px solid var(--border-color);
        }

        .layer-name {
            flex: 1;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .layer-count {
            font-size: 0.75rem;
            color: var(--text-secondary);
            background: var(--light-bg);
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* Center - Canvas Area */
        .canvas-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #fafafa;
        }

        .toolbar {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 8px 16px;
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .tool-group {
            display: flex;
            gap: 4px;
            padding: 0 8px;
            border-right: 1px solid var(--border-color);
        }

        .tool-group:last-child {
            border-right: none;
        }

        .tool-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-secondary);
        }

        .tool-btn:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .tool-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .canvas-container {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        #dxfCanvas {
            width: 100%;
            height: 100%;
            cursor: grab;
        }

        #dxfCanvas.grabbing {
            cursor: grabbing;
        }

        /* Canvas Controls */
        .canvas-controls {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            background: white;
            border-radius: 8px;
            padding: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .control-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .control-btn:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .zoom-indicator {
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-secondary);
            padding: 4px;
            border-top: 1px solid var(--border-color);
            margin-top: 4px;
        }

        /* Right Sidebar - Properties */
        .right-sidebar {
            width: 300px;
            background: white;
            border-left: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }

        .properties-panel {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
        }

        .property-group {
            margin-bottom: 20px;
        }

        .property-group-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .property-row {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .property-label {
            flex: 0 0 100px;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .property-value {
            flex: 1;
        }

        .property-input {
            width: 100%;
            padding: 6px 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .property-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .color-input-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .color-preview {
            width: 32px;
            height: 32px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
        }

        .color-hex {
            flex: 1;
        }

        /* Entity List */
        .entity-list {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid var(--border-color);
            border-radius: 6px;
        }

        .entity-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-bottom: 1px solid var(--border-color);
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .entity-item:hover {
            background: var(--light-bg);
        }

        .entity-item.selected {
            background: #dbeafe;
        }

        .entity-item:last-child {
            border-bottom: none;
        }

        .entity-type {
            width: 60px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-secondary);
        }

        .entity-info {
            flex: 1;
            font-size: 0.875rem;
        }

        .entity-actions {
            display: flex;
            gap: 4px;
        }

        .entity-action-btn {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.2s ease;
        }

        .entity-action-btn:hover {
            background: var(--light-bg);
            color: var(--primary-color);
        }

        /* Status Bar */
        .status-bar {
            background: var(--dark-bg);
            color: white;
            padding: 8px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
        }

        .status-left {
            display: flex;
            gap: 20px;
        }

        .status-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-label {
            color: #94a3b8;
        }

        .status-value {
            font-weight: 500;
        }

        /* Buttons */
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: var(--secondary-color);
            color: white;
        }

        .btn-secondary:hover {
            background: #475569;
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            padding: 24px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .modal-close {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.2s ease;
        }

        .modal-close:hover {
            background: var(--light-bg);
            color: var(--text-primary);
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: var(--dark-bg);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 2000;
        }

        .toast.show {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
        }

        .toast.success {
            background: var(--success-color);
        }

        .toast.error {
            background: var(--danger-color);
        }

        .toast.warning {
            background: var(--warning-color);
        }

        /* Loading Spinner */
        .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--border-color);
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 100;
        }

        .loading-overlay.active {
            display: flex;
        }

        /* Debug Panel */
        .debug-panel {
            position: fixed;
            top: 80px;
            right: 20px;
            width: 300px;
            max-height: 400px;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 500;
            display: none;
        }

        .debug-panel.active {
            display: block;
        }

        .debug-header {
            padding: 12px;
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .debug-content {
            padding: 12px;
            max-height: 300px;
            overflow-y: auto;
            font-family: monospace;
            font-size: 0.75rem;
        }

        .debug-toggle {
            position: fixed;
            top: 80px;
            right: 340px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            cursor: pointer;
            z-index: 501;
            display: none;
        }

        .debug-toggle.show {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <i class="fas fa-drafting-compass"></i>
            <span>DXF Viewer & Editor</span>
        </div>
        <div class="header-actions">
            <button class="btn btn-outline" onclick="newFile()">
                <i class="fas fa-file"></i>
                New
            </button>
            <button class="btn btn-outline" onclick="openFile()">
                <i class="fas fa-folder-open"></i>
                Open
            </button>
            <button class="btn btn-primary" onclick="saveFile()">
                <i class="fas fa-save"></i>
                Save
            </button>
            <button class="btn btn-outline" onclick="toggleDebug()" id="debugToggleBtn" style="display: none;">
                <i class="fas fa-bug"></i>
                Debug
            </button>
        </div>
    </header>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Left Sidebar -->
        <aside class="left-sidebar">
            <!-- File Upload Section -->
            <div class="sidebar-section">
                <div class="section-title">
                    <span>File</span>
                    <i class="fas fa-info-circle" style="font-size: 0.75rem;"></i>
                </div>
                <div class="upload-area" id="uploadArea">
                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                    <div class="upload-text">Drop DXF file here or click to browse</div>
                    <input type="file" id="fileInput" accept=".dxf" style="display: none;">
                </div>
                <div class="file-info" id="fileInfo">
                    <div class="info-row">
                        <span class="info-label">Name:</span>
                        <span class="info-value" id="fileName">-</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Size:</span>
                        <span class="info-value" id="fileSize">-</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Entities:</span>
                        <span class="info-value" id="fileEntities">0</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Layers:</span>
                        <span class="info-value" id="fileLayers">0</span>
                    </div>
                </div>
            </div>

            <!-- Layers Section -->
            <div class="sidebar-section" style="flex: 1; display: flex; flex-direction: column;">
                <div class="section-title">
                    <span>Layers</span>
                    <span id="layerCount" style="font-size: 0.75rem; color: var(--text-secondary);">0</span>
                </div>
                <div class="layers-container" id="layersContainer">
                    <!-- Layers will be populated here -->
                </div>
            </div>
        </aside>

        <!-- Canvas Area -->
        <main class="canvas-area">
            <!-- Toolbar -->
            <div class="toolbar">
                <div class="tool-group">
                    <button class="tool-btn active" data-tool="select" title="Select">
                        <i class="fas fa-mouse-pointer"></i>
                    </button>
                    <button class="tool-btn" data-tool="pan" title="Pan">
                        <i class="fas fa-hand-paper"></i>
                    </button>
                </div>
                
                <div class="tool-group">
                    <button class="tool-btn" data-tool="line" title="Line">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button class="tool-btn" data-tool="circle" title="Circle">
                        <i class="fas fa-circle"></i>
                    </button>
                    <button class="tool-btn" data-tool="arc" title="Arc">
                        <i class="fas fa-bezier-curve"></i>
                    </button>
                    <button class="tool-btn" data-tool="rectangle" title="Rectangle">
                        <i class="fas fa-square"></i>
                    </button>
                </div>
                
                <div class="tool-group">
                    <button class="tool-btn" data-tool="dimension" title="Dimension">
                        <i class="fas fa-ruler"></i>
                    </button>
                    <button class="tool-btn" data-tool="text" title="Text">
                        <i class="fas fa-font"></i>
                    </button>
                </div>
                
                <div class="tool-group">
                    <button class="tool-btn" onclick="undo()" title="Undo">
                        <i class="fas fa-undo"></i>
                    </button>
                    <button class="tool-btn" onclick="redo()" title="Redo">
                        <i class="fas fa-redo"></i>
                    </button>
                </div>
            </div>

            <!-- Canvas Container -->
            <div class="canvas-container">
                <canvas id="dxfCanvas"></canvas>
                <div class="loading-overlay" id="loadingOverlay">
                    <div style="text-align: center;">
                        <div class="spinner"></div>
                        <p style="margin-top: 12px; color: var(--text-secondary);">Loading DXF file...</p>
                    </div>
                </div>
                
                <!-- Canvas Controls -->
                <div class="canvas-controls">
                    <button class="control-btn" onclick="zoomIn()" title="Zoom In">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button class="control-btn" onclick="zoomOut()" title="Zoom Out">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button class="control-btn" onclick="fitToView()" title="Fit to View">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button class="control-btn" onclick="resetView()" title="Reset View">
                        <i class="fas fa-compress"></i>
                    </button>
                    <div class="zoom-indicator" id="zoomIndicator">100%</div>
                </div>
            </div>
        </main>

        <!-- Right Sidebar - Properties -->
        <aside class="right-sidebar">
            <div class="properties-panel">
                <!-- Entity Properties -->
                <div class="property-group">
                    <div class="property-group-title">Entity Properties</div>
                    <div id="entityProperties">
                        <div style="text-align: center; color: var(--text-secondary); padding: 20px;">
                            Select an entity to view properties
                        </div>
                    </div>
                </div>

                <!-- Layer Properties -->
                <div class="property-group">
                    <div class="property-group-title">Layer Properties</div>
                    <div id="layerProperties">
                        <div class="property-row">
                            <span class="property-label">Name:</span>
                            <div class="property-value">
                                <input type="text" class="property-input" id="layerNameInput" placeholder="Layer name">
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">Color:</span>
                            <div class="property-value">
                                <div class="color-input-wrapper">
                                    <div class="color-preview" id="layerColorPreview"></div>
                                    <input type="text" class="property-input color-hex" id="layerColorHex" placeholder="#000000">
                                </div>
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">Line Weight:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" id="lineWeightInput" min="0" max="5" step="0.1" value="1">
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">Line Type:</span>
                            <div class="property-value">
                                <select class="property-input" id="lineTypeSelect">
                                    <option value="continuous">Continuous</option>
                                    <option value="hidden">Hidden</option>
                                    <option value="center">Center</option>
                                    <option value="phantom">Phantom</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entity List -->
                <div class="property-group">
                    <div class="property-group-title">Entities (<span id="entityCount">0</span>)</div>
                    <div class="entity-list" id="entityList">
                        <!-- Entities will be populated here -->
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Status Bar -->
    <div class="status-bar">
        <div class="status-left">
            <div class="status-item">
                <span class="status-label">Entities:</span>
                <span class="status-value" id="statusEntityCount">0</span>
            </div>
            <div class="status-item">
                <span class="status-label">Layers:</span>
                <span class="status-value" id="statusLayerCount">0</span>
            </div>
            <div class="status-item">
                <span class="status-label">Position:</span>
                <span class="status-value" id="statusPosition">0, 0</span>
            </div>
            <div class="status-item">
                <span class="status-label">Zoom:</span>
                <span class="status-value" id="statusZoom">100%</span>
            </div>
        </div>
        <div class="status-right">
            <span id="statusMessage">Ready</span>
        </div>
    </div>

    <!-- Debug Panel -->
    <div class="debug-panel" id="debugPanel">
        <div class="debug-header">
            <span>Debug Information</span>
            <button onclick="toggleDebug()" style="background: none; border: none; cursor: pointer;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="debug-content" id="debugContent">
            <!-- Debug info will be displayed here -->
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast"></div>

    <!-- Hidden file input -->
    <input type="file" id="hiddenFileInput" accept=".dxf" style="display: none;">

    <script>
        // DXF Viewer & Editor Core - Improved Version
        class DXFViewer {
            constructor() {
                this.canvas = document.getElementById('dxfCanvas');
                this.ctx = this.canvas.getContext('2d');
                this.dxfData = null;
                this.layers = new Map();
                this.entities = [];
                this.selectedEntity = null;
                this.selectedLayer = null;
                this.currentTool = 'select';
                this.zoom = 1;
                this.panX = 0;
                this.panY = 0;
                this.isDragging = false;
                this.lastX = 0;
                this.lastY = 0;
                this.bounds = { min: { x: 0, y: 0 }, max: { x: 0, y: 0 } };
                this.debugMode = false;
                
                this.init();
            }

            init() {
                this.setupCanvas();
                this.setupEventListeners();
                this.setupToolbar();
                this.render();
                
                // Enable debug mode
                this.debugMode = true;
                document.getElementById('debugToggleBtn').style.display = 'inline-flex';
            }

            setupCanvas() {
                this.resizeCanvas();
                window.addEventListener('resize', () => this.resizeCanvas());
            }

            resizeCanvas() {
                const container = this.canvas.parentElement;
                this.canvas.width = container.clientWidth;
                this.canvas.height = container.clientHeight;
                this.render();
            }

            setupEventListeners() {
                // File upload
                const uploadArea = document.getElementById('uploadArea');
                const fileInput = document.getElementById('fileInput');
                
                uploadArea.addEventListener('click', () => fileInput.click());
                uploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadArea.classList.add('dragover');
                });
                uploadArea.addEventListener('dragleave', () => {
                    uploadArea.classList.remove('dragover');
                });
                uploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    uploadArea.classList.remove('dragover');
                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        this.loadFile(files[0]);
                    }
                });
                fileInput.addEventListener('change', (e) => {
                    if (e.target.files.length > 0) {
                        this.loadFile(e.target.files[0]);
                    }
                });

                // Canvas mouse events
                this.canvas.addEventListener('mousedown', (e) => this.onMouseDown(e));
                this.canvas.addEventListener('mousemove', (e) => this.onMouseMove(e));
                this.canvas.addEventListener('mouseup', (e) => this.onMouseUp(e));
                this.canvas.addEventListener('wheel', (e) => this.onWheel(e));
            }

            setupToolbar() {
                const toolButtons = document.querySelectorAll('.tool-btn[data-tool]');
                toolButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        toolButtons.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
                        this.currentTool = btn.dataset.tool;
                        this.updateCursor();
                    });
                });
            }

            updateCursor() {
                switch (this.currentTool) {
                    case 'pan':
                        this.canvas.style.cursor = 'grab';
                        break;
                    case 'select':
                        this.canvas.style.cursor = 'default';
                        break;
                    default:
                        this.canvas.style.cursor = 'crosshair';
                }
            }

            loadFile(file) {
                if (!file.name.toLowerCase().endsWith('.dxf')) {
                    this.showToast('Please select a valid DXF file', 'error');
                    return;
                }

                this.showLoading(true);
                const reader = new FileReader();
                
                reader.onload = (e) => {
                    try {
                        const content = e.target.result;
                        this.debugLog('Starting DXF parse...');
                        this.parseDXF(content);
                        this.updateFileInfo(file);
                        this.showToast('DXF file loaded successfully', 'success');
                    } catch (error) {
                        this.debugLog('Error loading DXF: ' + error.message);
                        this.showToast('Error loading DXF file: ' + error.message, 'error');
                    } finally {
                        this.showLoading(false);
                    }
                };
                
                reader.readAsText(file);
            }

            parseDXF(content) {
                this.dxfData = {
                    layers: new Map(),
                    entities: [],
                    blocks: new Map(),
                    header: {}
                };

                const lines = content.split('\n').map(line => line.trim());
                let i = 0;
                let currentSection = null;
                let currentLayer = '0';
                let currentEntity = null;

                this.debugLog(`Total lines: ${lines.length}`);

                while (i < lines.length) {
                    const line = lines[i];
                    
                    if (line === '0') {
                        // Save previous entity
                        if (currentEntity && currentEntity.type) {
                            this.dxfData.entities.push(currentEntity);
                            this.updateBounds(currentEntity);
                            this.debugLog(`Added entity: ${currentEntity.type} on layer ${currentEntity.layer}`);
                        }
                        
                        // Start new entity
                        i++;
                        if (i < lines.length) {
                            const entityType = lines[i];
                            currentEntity = { 
                                type: entityType, 
                                layer: currentLayer, 
                                data: {} 
                            };
                            this.debugLog(`Found entity type: ${entityType}`);
                        }
                    } else if (line === 'SECTION') {
                        currentSection = 'section';
                        this.debugLog('Entering SECTION');
                    } else if (line === 'ENDSEC') {
                        currentSection = null;
                        this.debugLog('Exiting SECTION');
                    } else if (line === 'HEADER') {
                        currentSection = 'header';
                        this.debugLog('Entering HEADER section');
                    } else if (line === 'TABLES') {
                        currentSection = 'tables';
                        this.debugLog('Entering TABLES section');
                    } else if (line === 'LAYER' && currentSection === 'tables') {
                        const layer = this.parseLayer(lines, i);
                        this.dxfData.layers.set(layer.name, layer);
                        this.debugLog(`Parsed layer: ${layer.name}`);
                    } else if (line === 'ENTITIES') {
                        currentSection = 'entities';
                        this.debugLog('Entering ENTITIES section');
                    } else if (currentEntity && currentSection === 'entities') {
                        // Parse entity data
                        i++;
                        if (i < lines.length) {
                            const value = lines[i];
                            this.parseEntityData(currentEntity, parseInt(line), value);
                        }
                    }
                    
                    i++;
                }

                // Add last entity
                if (currentEntity && currentEntity.type) {
                    this.dxfData.entities.push(currentEntity);
                    this.updateBounds(currentEntity);
                    this.debugLog(`Added final entity: ${currentEntity.type}`);
                }

                this.entities = this.dxfData.entities;
                this.layers = this.dxfData.layers;
                
                this.debugLog(`Parse complete. Entities: ${this.entities.length}, Layers: ${this.layers.size}`);
                
                // Ensure default layer exists
                if (!this.layers.has('0')) {
                    this.layers.set('0', {
                        name: '0',
                        color: 7, // White
                        visible: true,
                        frozen: false,
                        lineType: 'continuous',
                        lineWeight: 0
                    });
                }
                
                this.updateUI();
                this.fitToView();
                this.render();
            }

            parseLayer(lines, startIndex) {
                const layer = {
                    name: '0',
                    color: 7,
                    visible: true,
                    frozen: false,
                    lineType: 'continuous',
                    lineWeight: 0
                };

                for (let i = startIndex + 1; i < lines.length; i++) {
                    const line = lines[i];
                    if (line === '0') break;
                    
                    i++; // Get the value
                    if (i >= lines.length) break;
                    const value = lines[i];
                    
                    if (line === '2') {
                        layer.name = value;
                    } else if (line === '62') {
                        layer.color = parseInt(value);
                    } else if (line === '70') {
                        const flags = parseInt(value);
                        layer.frozen = (flags & 1) !== 0;
                    }
                }

                return layer;
            }

            parseEntityData(entity, groupCode, value) {
                switch (groupCode) {
                    case 8: // Layer
                        entity.layer = value;
                        break;
                    case 10: // X1 coordinate
                        entity.data.x1 = parseFloat(value);
                        break;
                    case 20: // Y1 coordinate
                        entity.data.y1 = parseFloat(value);
                        break;
                    case 11: // X2 coordinate
                        entity.data.x2 = parseFloat(value);
                        break;
                    case 21: // Y2 coordinate
                        entity.data.y2 = parseFloat(value);
                        break;
                    case 40: // Radius
                        entity.data.radius = parseFloat(value);
                        break;
                    case 50: // Start angle
                        entity.data.startAngle = parseFloat(value);
                        break;
                    case 51: // End angle
                        entity.data.endAngle = parseFloat(value);
                        break;
                }
            }

            updateBounds(entity) {
                let minX = Infinity, minY = Infinity;
                let maxX = -Infinity, maxY = -Infinity;

                if (entity.type === 'LINE') {
                    minX = Math.min(entity.data.x1 || 0, entity.data.x2 || 0);
                    maxX = Math.max(entity.data.x1 || 0, entity.data.x2 || 0);
                    minY = Math.min(entity.data.y1 || 0, entity.data.y2 || 0);
                    maxY = Math.max(entity.data.y1 || 0, entity.data.y2 || 0);
                } else if (entity.type === 'CIRCLE') {
                    const r = entity.data.radius || 0;
                    minX = (entity.data.x1 || 0) - r;
                    maxX = (entity.data.x1 || 0) + r;
                    minY = (entity.data.y1 || 0) - r;
                    maxY = (entity.data.y1 || 0) + r;
                } else if (entity.type === 'ARC') {
                    const r = entity.data.radius || 0;
                    minX = (entity.data.x1 || 0) - r;
                    maxX = (entity.data.x1 || 0) + r;
                    minY = (entity.data.y1 || 0) - r;
                    maxY = (entity.data.y1 || 0) + r;
                } else if (entity.type === 'LWPOLYLINE') {
                    // Handle polyline vertices
                    const vertices = entity.data.vertices || [];
                    vertices.forEach(v => {
                        minX = Math.min(minX, v.x);
                        maxX = Math.max(maxX, v.x);
                        minY = Math.min(minY, v.y);
                        maxY = Math.max(maxY, v.y);
                    });
                }

                this.bounds.min.x = Math.min(this.bounds.min.x, minX);
                this.bounds.max.x = Math.max(this.bounds.max.x, maxX);
                this.bounds.min.y = Math.min(this.bounds.min.y, minY);
                this.bounds.max.y = Math.max(this.bounds.max.y, maxY);
            }

            updateUI() {
                this.updateLayersList();
                this.updateEntityList();
                this.updateStatusBar();
            }

            updateLayersList() {
                const container = document.getElementById('layersContainer');
                container.innerHTML = '';
                
                this.layers.forEach((layer, name) => {
                    const layerEl = document.createElement('div');
                    layerEl.className = 'layer-item';
                    layerEl.innerHTML = `
                        <i class="fas fa-eye layer-visibility ${layer.visible ? 'visible' : ''}"></i>
                        <div class="layer-color" style="background-color: ${this.getColorFromIndex(layer.color)}"></div>
                        <div class="layer-name">${name}</div>
                        <div class="layer-count">${this.getEntityCountInLayer(name)}</div>
                    `;
                    
                    layerEl.addEventListener('click', () => this.selectLayer(name));
                    container.appendChild(layerEl);
                });
                
                document.getElementById('layerCount').textContent = this.layers.size;
            }

            updateEntityList() {
                const container = document.getElementById('entityList');
                container.innerHTML = '';
                
                this.entities.forEach((entity, index) => {
                    const entityEl = document.createElement('div');
                    entityEl.className = 'entity-item';
                    entityEl.innerHTML = `
                        <div class="entity-type">${entity.type || 'UNKNOWN'}</div>
                        <div class="entity-info">Layer: ${entity.layer}</div>
                        <div class="entity-actions">
                            <button class="entity-action-btn" onclick="dxfViewer.selectEntity(${index})">
                                <i class="fas fa-mouse-pointer"></i>
                            </button>
                            <button class="entity-action-btn" onclick="dxfViewer.deleteEntity(${index})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    
                    entityEl.addEventListener('click', () => this.selectEntity(index));
                    container.appendChild(entityEl);
                });
                
                document.getElementById('entityCount').textContent = this.entities.length;
            }

            updateStatusBar() {
                document.getElementById('statusEntityCount').textContent = this.entities.length;
                document.getElementById('statusLayerCount').textContent = this.layers.size;
                document.getElementById('statusZoom').textContent = Math.round(this.zoom * 100) + '%';
            }

            updateFileInfo(file) {
                document.getElementById('fileInfo').classList.add('active');
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('fileSize').textContent = this.formatFileSize(file.size);
                document.getElementById('fileEntities').textContent = this.entities.length;
                document.getElementById('fileLayers').textContent = this.layers.size;
            }

            getEntityCountInLayer(layerName) {
                return this.entities.filter(e => e.layer === layerName).length;
            }

            getColorFromIndex(colorIndex) {
                // AutoCAD color index mapping
                const colors = [
                    '#000000', '#FF0000', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#FF00FF', '#FFFFFF',
                    '#414141', '#808080', '#FF0000', '#FF7F7F', '#FFFF00', '#FFFF7F', '#00FF00', '#7FFF7F',
                    '#00FFFF', '#7FFFFF', '#0000FF', '#7F7FFF', '#FF00FF', '#FF7FFF', '#FFFFFF', '#C0C0C0'
                ];
                return colors[colorIndex] || '#000000';
            }

            render() {
                if (!this.ctx) return;
                
                // Clear canvas
                this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
                
                // Set up transformations
                this.ctx.save();
                this.ctx.translate(this.canvas.width / 2 + this.panX, this.canvas.height / 2 + this.panY);
                this.ctx.scale(this.zoom, -this.zoom); // Flip Y axis for CAD coordinates
                
                // Draw grid
                this.drawGrid();
                
                // Draw entities
                this.entities.forEach(entity => {
                    const layer = this.layers.get(entity.layer) || this.layers.get('0');
                    if (layer && layer.visible) {
                        this.drawEntity(entity, layer);
                    }
                });
                
                // Draw selected entity
                if (this.selectedEntity !== null) {
                    this.highlightEntity(this.entities[this.selectedEntity]);
                }
                
                this.ctx.restore();
            }

            drawGrid() {
                const gridSize = 10;
                const width = this.canvas.width / this.zoom;
                const height = this.canvas.height / this.zoom;
                
                this.ctx.strokeStyle = '#e0e0e0';
                this.ctx.lineWidth = 0.5;
                
                for (let x = -width/2; x < width/2; x += gridSize) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(x, -height/2);
                    this.ctx.lineTo(x, height/2);
                    this.ctx.stroke();
                }
                
                for (let y = -height/2; y < height/2; y += gridSize) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(-width/2, y);
                    this.ctx.lineTo(width/2, y);
                    this.ctx.stroke();
                }
            }

            drawEntity(entity, layer) {
                this.ctx.strokeStyle = this.getColorFromIndex(layer.color);
                this.ctx.lineWidth = (layer.lineWeight || 1) / this.zoom;
                
                switch (entity.type) {
                    case 'LINE':
                        this.drawLine(entity);
                        break;
                    case 'CIRCLE':
                        this.drawCircle(entity);
                        break;
                    case 'ARC':
                        this.drawArc(entity);
                        break;
                    case 'LWPOLYLINE':
                        this.drawPolyline(entity);
                        break;
                    case 'POLYLINE':
                        this.drawPolyline(entity);
                        break;
                }
            }

            drawLine(entity) {
                if (entity.data.x1 !== undefined && entity.data.y1 !== undefined &&
                    entity.data.x2 !== undefined && entity.data.y2 !== undefined) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(entity.data.x1, entity.data.y1);
                    this.ctx.lineTo(entity.data.x2, entity.data.y2);
                    this.ctx.stroke();
                }
            }

            drawCircle(entity) {
                if (entity.data.x1 !== undefined && entity.data.y1 !== undefined && entity.data.radius !== undefined) {
                    this.ctx.beginPath();
                    this.ctx.arc(entity.data.x1, entity.data.y1, entity.data.radius, 0, 2 * Math.PI);
                    this.ctx.stroke();
                }
            }

            drawArc(entity) {
                if (entity.data.x1 !== undefined && entity.data.y1 !== undefined && entity.data.radius !== undefined) {
                    const startAngle = ((entity.data.startAngle || 0) * Math.PI) / 180;
                    const endAngle = ((entity.data.endAngle || 360) * Math.PI) / 180;
                    
                    this.ctx.beginPath();
                    this.ctx.arc(entity.data.x1, entity.data.y1, entity.data.radius, startAngle, endAngle);
                    this.ctx.stroke();
                }
            }

            drawPolyline(entity) {
                // Simplified polyline drawing - would need proper vertex parsing
                if (entity.data.x1 !== undefined && entity.data.y1 !== undefined) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(entity.data.x1, entity.data.y1);
                    if (entity.data.x2 !== undefined && entity.data.y2 !== undefined) {
                        this.ctx.lineTo(entity.data.x2, entity.data.y2);
                    }
                    this.ctx.stroke();
                }
            }

            highlightEntity(entity) {
                this.ctx.strokeStyle = '#ff0000';
                this.ctx.lineWidth = 2 / this.zoom;
                this.ctx.setLineDash([5, 5]);
                
                switch (entity.type) {
                    case 'LINE':
                        this.drawLine(entity);
                        break;
                    case 'CIRCLE':
                        this.drawCircle(entity);
                        break;
                    case 'ARC':
                        this.drawArc(entity);
                        break;
                }
                
                this.ctx.setLineDash([]);
            }

            onMouseDown(e) {
                const rect = this.canvas.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                if (this.currentTool === 'pan') {
                    this.isDragging = true;
                    this.lastX = x;
                    this.lastY = y;
                    this.canvas.classList.add('grabbing');
                } else if (this.currentTool === 'select') {
                    this.selectEntityAt(x, y);
                }
            }

            onMouseMove(e) {
                const rect = this.canvas.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                // Update status bar
                const worldCoords = this.screenToWorld(x, y);
                document.getElementById('statusPosition').textContent = 
                    `${worldCoords.x.toFixed(2)}, ${worldCoords.y.toFixed(2)}`;
                
                if (this.isDragging && this.currentTool === 'pan') {
                    this.panX += x - this.lastX;
                    this.panY += y - this.lastY;
                    this.lastX = x;
                    this.lastY = y;
                    this.render();
                }
            }

            onMouseUp(e) {
                this.isDragging = false;
                this.canvas.classList.remove('grabbing');
            }

            onWheel(e) {
                e.preventDefault();
                const delta = e.deltaY > 0 ? 0.9 : 1.1;
                this.zoom *= delta;
                this.zoom = Math.max(0.1, Math.min(10, this.zoom));
                this.updateZoomIndicator();
                this.render();
            }

            screenToWorld(screenX, screenY) {
                const x = (screenX - this.canvas.width / 2 - this.panX) / this.zoom;
                const y = -(screenY - this.canvas.height / 2 - this.panY) / this.zoom;
                return { x, y };
            }

            selectEntityAt(x, y) {
                const worldCoords = this.screenToWorld(x, y);
                // Simplified selection - would need proper hit testing
                for (let i = this.entities.length - 1; i >= 0; i--) {
                    const entity = this.entities[i];
                    if (this.isPointNearEntity(worldCoords, entity)) {
                        this.selectEntity(i);
                        return;
                    }
                }
                this.selectEntity(null);
            }

            isPointNearEntity(point, entity) {
                // Simplified proximity check
                const threshold = 5 / this.zoom;
                
                if (entity.type === 'LINE') {
                    return this.distanceToLine(point, 
                        { x: entity.data.x1 || 0, y: entity.data.y1 || 0 },
                        { x: entity.data.x2 || 0, y: entity.data.y2 || 0 }) < threshold;
                } else if (entity.type === 'CIRCLE') {
                    const dist = Math.sqrt(
                        Math.pow(point.x - (entity.data.x1 || 0), 2) + 
                        Math.pow(point.y - (entity.data.y1 || 0), 2)
                    );
                    return Math.abs(dist - (entity.data.radius || 0)) < threshold;
                }
                
                return false;
            }

            distanceToLine(point, lineStart, lineEnd) {
                const A = point.x - lineStart.x;
                const B = point.y - lineStart.y;
                const C = lineEnd.x - lineStart.x;
                const D = lineEnd.y - lineStart.y;
                
                const dot = A * C + B * D;
                const lenSq = C * C + D * D;
                let param = -1;
                
                if (lenSq !== 0) param = dot / lenSq;
                
                let xx, yy;
                
                if (param < 0) {
                    xx = lineStart.x;
                    yy = lineStart.y;
                } else if (param > 1) {
                    xx = lineEnd.x;
                    yy = lineEnd.y;
                } else {
                    xx = lineStart.x + param * C;
                    yy = lineStart.y + param * D;
                }
                
                const dx = point.x - xx;
                const dy = point.y - yy;
                
                return Math.sqrt(dx * dx + dy * dy);
            }

            selectEntity(index) {
                this.selectedEntity = index;
                
                // Update entity list UI
                document.querySelectorAll('.entity-item').forEach((el, i) => {
                    el.classList.toggle('selected', i === index);
                });
                
                // Update properties panel
                if (index !== null) {
                    this.showEntityProperties(this.entities[index]);
                } else {
                    this.clearEntityProperties();
                }
                
                this.render();
            }

            selectLayer(layerName) {
                this.selectedLayer = layerName;
                const layer = this.layers.get(layerName);
                if (layer) {
                    this.showLayerProperties(layer);
                }
            }

            showEntityProperties(entity) {
                const container = document.getElementById('entityProperties');
                container.innerHTML = `
                    <div class="property-row">
                        <span class="property-label">Type:</span>
                        <div class="property-value">
                            <input type="text" class="property-input" value="${entity.type}" readonly>
                        </div>
                    </div>
                    <div class="property-row">
                        <span class="property-label">Layer:</span>
                        <div class="property-value">
                            <input type="text" class="property-input" value="${entity.layer}">
                        </div>
                    </div>
                    ${this.getEntitySpecificProperties(entity)}
                `;
            }

            getEntitySpecificProperties(entity) {
                let html = '';
                
                if (entity.type === 'LINE') {
                    html += `
                        <div class="property-row">
                            <span class="property-label">Start X:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" value="${entity.data.x1 || 0}" step="0.01">
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">Start Y:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" value="${entity.data.y1 || 0}" step="0.01">
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">End X:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" value="${entity.data.x2 || 0}" step="0.01">
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">End Y:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" value="${entity.data.y2 || 0}" step="0.01">
                            </div>
                        </div>
                    `;
                } else if (entity.type === 'CIRCLE') {
                    html += `
                        <div class="property-row">
                            <span class="property-label">Center X:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" value="${entity.data.x1 || 0}" step="0.01">
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">Center Y:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" value="${entity.data.y1 || 0}" step="0.01">
                            </div>
                        </div>
                        <div class="property-row">
                            <span class="property-label">Radius:</span>
                            <div class="property-value">
                                <input type="number" class="property-input" value="${entity.data.radius || 0}" step="0.01">
                            </div>
                        </div>
                    `;
                }
                
                return html;
            }

            clearEntityProperties() {
                const container = document.getElementById('entityProperties');
                container.innerHTML = `
                    <div style="text-align: center; color: var(--text-secondary); padding: 20px;">
                        Select an entity to view properties
                    </div>
                `;
            }

            showLayerProperties(layer) {
                document.getElementById('layerNameInput').value = layer.name;
                document.getElementById('layerColorPreview').style.backgroundColor = this.getColorFromIndex(layer.color);
                document.getElementById('layerColorHex').value = this.getColorFromIndex(layer.color);
                document.getElementById('lineWeightInput').value = layer.lineWeight || 0;
                document.getElementById('lineTypeSelect').value = layer.lineType || 'continuous';
            }

            deleteEntity(index) {
                if (confirm('Are you sure you want to delete this entity?')) {
                    this.entities.splice(index, 1);
                    this.selectedEntity = null;
                    this.updateUI();
                    this.render();
                    this.showToast('Entity deleted', 'success');
                }
            }

            fitToView() {
                if (this.entities.length === 0) return;
                
                const padding = 20;
                const width = (this.bounds.max.x - this.bounds.min.x) + padding * 2;
                const height = (this.bounds.max.y - this.bounds.min.y) + padding * 2;
                
                const scaleX = this.canvas.width / width;
                const scaleY = this.canvas.height / height;
                
                this.zoom = Math.min(scaleX, scaleY, 2);
                this.panX = -(this.bounds.min.x + this.bounds.max.x) * this.zoom / 2;
                this.panY = (this.bounds.min.y + this.bounds.max.y) * this.zoom / 2;
                
                this.updateZoomIndicator();
                this.render();
            }

            resetView() {
                this.zoom = 1;
                this.panX = 0;
                this.panY = 0;
                this.updateZoomIndicator();
                this.render();
            }

            zoomIn() {
                this.zoom *= 1.2;
                this.zoom = Math.min(this.zoom, 10);
                this.updateZoomIndicator();
                this.render();
            }

            zoomOut() {
                this.zoom *= 0.8;
                this.zoom = Math.max(this.zoom, 0.1);
                this.updateZoomIndicator();
                this.render();
            }

            updateZoomIndicator() {
                const zoomPercent = Math.round(this.zoom * 100);
                document.getElementById('zoomIndicator').textContent = zoomPercent + '%';
                document.getElementById('statusZoom').textContent = zoomPercent + '%';
            }

            showLoading(show) {
                const overlay = document.getElementById('loadingOverlay');
                if (show) {
                    overlay.classList.add('active');
                } else {
                    overlay.classList.remove('active');
                }
            }

            showToast(message, type = 'info') {
                const toast = document.getElementById('toast');
                toast.textContent = message;
                toast.className = `toast ${type}`;
                toast.classList.add('show');
                
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }

            formatFileSize(bytes) {
                if (bytes < 1024) return bytes + ' B';
                if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(2) + ' KB';
                return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
            }

            debugLog(message) {
                if (!this.debugMode) return;
                
                const debugContent = document.getElementById('debugContent');
                const timestamp = new Date().toLocaleTimeString();
                debugContent.innerHTML += `[${timestamp}] ${message}\n`;
                debugContent.scrollTop = debugContent.scrollHeight;
            }
        }

        // Global functions
        let dxfViewer;

        function newFile() {
            if (confirm('Create a new file? Unsaved changes will be lost.')) {
                dxfViewer = new DXFViewer();
                document.getElementById('fileInfo').classList.remove('active');
                dxfViewer.showToast('New file created', 'success');
            }
        }

        function openFile() {
            document.getElementById('hiddenFileInput').click();
        }

        function saveFile() {
            if (!dxfViewer.dxfData) {
                dxfViewer.showToast('No file to save', 'warning');
                return;
            }
            
            // Simplified DXF export
            let dxfContent = '0\nSECTION\n2\nENTITIES\n';
            
            dxfViewer.entities.forEach(entity => {
                dxfContent += `0\n${entity.type}\n8\n${entity.layer}\n`;
                if (entity.data.x1 !== undefined) dxfContent += `10\n${entity.data.x1}\n`;
                if (entity.data.y1 !== undefined) dxfContent += `20\n${entity.data.y1}\n`;
                if (entity.data.x2 !== undefined) dxfContent += `11\n${entity.data.x2}\n`;
                if (entity.data.y2 !== undefined) dxfContent += `21\n${entity.data.y2}\n`;
                if (entity.data.radius !== undefined) dxfContent += `40\n${entity.data.radius}\n`;
            });
            
            dxfContent += '0\nENDSEC\n0\nEOF';
            
            const blob = new Blob([dxfContent], { type: 'application/dxf' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'drawing.dxf';
            a.click();
            URL.revokeObjectURL(url);
            
            dxfViewer.showToast('File saved successfully', 'success');
        }

        function zoomIn() {
            dxfViewer.zoomIn();
        }

        function zoomOut() {
            dxfViewer.zoomOut();
        }

        function fitToView() {
            dxfViewer.fitToView();
        }

        function resetView() {
            dxfViewer.resetView();
        }

        function undo() {
            dxfViewer.showToast('Undo feature coming soon', 'info');
        }

        function redo() {
            dxfViewer.showToast('Redo feature coming soon', 'info');
        }

        function toggleDebug() {
            const panel = document.getElementById('debugPanel');
            const btn = document.getElementById('debugToggleBtn');
            panel.classList.toggle('active');
        }

        // Initialize application
        document.addEventListener('DOMContentLoaded', () => {
            dxfViewer = new DXFViewer();
            
            // Setup hidden file input
            document.getElementById('hiddenFileInput').addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    dxfViewer.loadFile(e.target.files[0]);
                }
            });
        });
    </script>
</body>
</html>